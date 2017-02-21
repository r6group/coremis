<?php

namespace kpi\controllers;

use kpi\models\KpiList;
use kpi\models\KpiSum;
use kpi\models\Comments;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use common\models\Profile;
use common\components\ActiveResponse;
use kpi\models\s;
use common\components\ThaiHelper;


class KpiController extends \yii\web\Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create-data-table'],
                'rules' => [

                    [
                        'actions' => ['create-data-table'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin'],
                    ],

                    // everything else is denied
                ],
            ],
        ];
    }



    public function actionIndex($id = 1, $z = "06", $embeded = '0', $title = '1', $gauge='1', $gis='1', $chart='1', $table ='1', $desc='1', $comment='1', $kpi_group = 0)
    {
        if ($kpi_group > 0) {
            $this->layout = '../../themes/kingadmin/layouts/main_dashboard';
        }

        $embeded = $embeded <> '1' ? '0' : '1';

        $title = $title <> '0' ? '1' : '0';
        $gauge = $gauge <> '0' ? '1' : '0';
        $gis = $gis <> '0' ? '1' : '0';
        $chart = $chart <> '0' ? '1' : '0';
        $table = $table <> '0' ? '1' : '0';
        $desc = $desc <> '0' ? '1' : '0';
        $comment = $comment <> '0' ? '1' : '0';

        $lv = Yii::$app->getRequest()->getQueryParam('lv');

        if (is_null($lv)){
            $lv='0';
        }

        if ($lv == '') { $lv='0';}
        if ($id == '') { $id='1';}
        if ($z == '') { $z='06';}


        $s_model = new s();

        if ($s_model->load(Yii::$app->request->queryParams)) {
            
            $cookies = Yii::$app->response->cookies;


            $cookies->remove('KpiScope');
            unset($cookies['KpiScope']);
            $cookies->remove('KpiRegion');
            unset($cookies['KpiRegion']);
            $cookies->remove('KpiProvince');
            unset($cookies['KpiProvince']);
            $cookies->remove('KpiDistrict');
            unset($cookies['KpiDistrict']);
            $cookies->remove('KpiSubdistrict');
            unset($cookies['KpiSubdistrict']);
            $cookies->remove('KpiHospcode');
            unset($cookies['KpiHospcode']);



            $cookies->add(new \yii\web\Cookie([
                'name' => 'KpiScope',
                'value' => $s_model->scope,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'KpiRegion',
                'value' => $s_model->region,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'KpiProvince',
                'value' => $s_model->province,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'KpiDistrict',
                'value' => $s_model->district,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'KpiSubdistrict',
                'value' => $s_model->subdistrict,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'KpiHospcode',
                'value' => $s_model->hospcode,
            ]));


            $lv = $s_model->scope = 1 ? 2 : $s_model->scope;
        }



        if ($embeded == '1') {
            $this->layout = '/blank';
        }


        $kpi_id = $id;
        $sql = "";
        $postfix_title = "";



        $connection = Yii::$app->db_kpi;


        $kpi_list = $connection->cache(function ($connection) USE ($id){
            return KpiList::findOne(['id' => $id]);
        },300, null);



        $sum_table_name = 'kpi_sum';
        if ($kpi_list->hosp_visible == '') {
            switch ($kpi_list->kpi_level) {
                case "ประเทศ":
                    $sum_table_name = 'kpi_sum_moph';
                    break;
                case "สป.":
                    $sum_table_name = 'kpi_sum_moph';
                    break;
                case "กรม":
                    $sum_table_name = 'kpi_sum_moph';
                    break;
                case "เขต":
                    $sum_table_name = 'kpi_sum_region';
                    break;
                case "จังหวัด":
                    $sum_table_name = 'kpi_sum';
                    break;


            }

        }




        if ($lv == 0) {
            $data = $connection->cache(function ($connection) use ($sum_table_name, $kpi_id) {
                return $connection->createCommand('
   SELECT s.id, p.zoneid AS provid,
CONCAT("เขตฯ ",p.zoneid) AS provname,
SUM(s.kpi_a_value) kpi_a_value,
SUM(s.kpi_a_value_q1) kpi_a_value_q1,
SUM(s.kpi_b_value) kpi_b_value,
SUM(s.kpi_c_value) kpi_c_value,
SUM(s.kpi_d_value) kpi_d_value,


IF(p.zoneid = "01", l.result_r01_q1, IF(p.zoneid = "02", l.result_r02_q1, IF(p.zoneid = "03", l.result_r03_q1, IF(p.zoneid = "04", l.result_r04_q1, IF(p.zoneid = "05", l.result_r05_q1,
IF(p.zoneid = "06", l.result_r06_q1, IF(p.zoneid = "07", l.result_r07_q1, IF(p.zoneid = "08", l.result_r08_q1, IF(p.zoneid = "09", l.result_r09_q1, IF(p.zoneid = "10", l.result_r10_q1,
IF(p.zoneid = "11", l.result_r11_q1, IF(p.zoneid = "12", l.result_r12_q1, IF(p.zoneid = "13", l.result_r13_q1, 0))))))))))))) AS kpi_result_q1,

IF(p.zoneid = "01", l.result_r01_q2, IF(p.zoneid = "02", l.result_r02_q2, IF(p.zoneid = "03", l.result_r03_q2, IF(p.zoneid = "04", l.result_r04_q2, IF(p.zoneid = "05", l.result_r05_q2,
IF(p.zoneid = "06", l.result_r06_q2, IF(p.zoneid = "07", l.result_r07_q2, IF(p.zoneid = "08", l.result_r08_q2, IF(p.zoneid = "09", l.result_r09_q2, IF(p.zoneid = "10", l.result_r10_q2,
IF(p.zoneid = "11", l.result_r11_q2, IF(p.zoneid = "12", l.result_r12_q2, IF(p.zoneid = "13", l.result_r13_q2, 0))))))))))))) AS kpi_result_q2,

IF(p.zoneid = "01", l.result_r01_q3, IF(p.zoneid = "02", l.result_r02_q3, IF(p.zoneid = "03", l.result_r03_q3, IF(p.zoneid = "04", l.result_r04_q3, IF(p.zoneid = "05", l.result_r05_q3,
IF(p.zoneid = "06", l.result_r06_q3, IF(p.zoneid = "07", l.result_r07_q3, IF(p.zoneid = "08", l.result_r08_q3, IF(p.zoneid = "09", l.result_r09_q3, IF(p.zoneid = "10", l.result_r10_q3,
IF(p.zoneid = "11", l.result_r11_q3, IF(p.zoneid = "12", l.result_r12_q3, IF(p.zoneid = "13", l.result_r13_q3, 0))))))))))))) AS kpi_result_q3,

IF(p.zoneid = "01", l.result_r01_q4, IF(p.zoneid = "02", l.result_r02_q4, IF(p.zoneid = "03", l.result_r03_q4, IF(p.zoneid = "04", l.result_r04_q4, IF(p.zoneid = "05", l.result_r05_q4,
IF(p.zoneid = "06", l.result_r06_q4, IF(p.zoneid = "07", l.result_r07_q4, IF(p.zoneid = "08", l.result_r08_q4, IF(p.zoneid = "09", l.result_r09_q4, IF(p.zoneid = "10", l.result_r10_q4,
IF(p.zoneid = "11", l.result_r11_q4, IF(p.zoneid = "12", l.result_r12_q4, IF(p.zoneid = "13", l.result_r13_q4, 0))))))))))))) AS kpi_result_q4,

l.result,
IF(p.zoneid = "01", l.result_r01, IF(p.zoneid = "02", l.result_r02, IF(p.zoneid = "03", l.result_r03, IF(p.zoneid = "04", l.result_r04, IF(p.zoneid = "05", l.result_r05,
IF(p.zoneid = "06", l.result_r06, IF(p.zoneid = "07", l.result_r07, IF(p.zoneid = "08", l.result_r08, IF(p.zoneid = "09", l.result_r09, IF(p.zoneid = "10", l.result_r10,
IF(p.zoneid = "11", l.result_r11, IF(p.zoneid = "12", l.result_r12, IF(p.zoneid = "13", l.result_r13, 0))))))))))))) AS kpi_result,



GROUP_CONCAT(s.attach_files) attach_files,
GROUP_CONCAT(s.qwin_q1) qwin_q1,
GROUP_CONCAT(s.qwin_q2) qwin_q2,
GROUP_CONCAT(s.qwin_q3) qwin_q3,
GROUP_CONCAT(s.qwin_q4) qwin_q4,
GROUP_CONCAT(s.content_file) content_file,
GROUP_CONCAT(s.rep_q1) rep_q1,
GROUP_CONCAT(s.rep_q2) rep_q2,
GROUP_CONCAT(s.rep_q3) rep_q3,
GROUP_CONCAT(s.rep_q4) rep_q4,


MAX(s.last_update) AS last_update
    FROM co_province p
    LEFT JOIN
    (SELECT s.id, s.kpi_id,
s.kpi_provcode,
s.kpi_a_value,
s.kpi_a_value_q1,
s.kpi_b_value,
s.kpi_c_value,
s.kpi_d_value,
s.kpi_result,
s.kpi_result_q1,
s.kpi_result_q2,
s.kpi_result_q3,
s.kpi_result_q4,
s.attach_files, s.qwin_q1, s.qwin_q2, s.qwin_q3, s.qwin_q4, s.content_file, s.rep_q1, s.rep_q2, s.rep_q3, s.rep_q4,
s.last_update
    FROM '.$sum_table_name.' s
    WHERE s.kpi_id = '.$kpi_id.'
    ) s ON p.provid = s.kpi_provcode
JOIN kpi_list l ON l.id = '.$kpi_id.'

    GROUP BY p.zoneid
    ORDER BY p.zoneid

            ')->queryAll();
            },300, null);


            $sql = "SELECT AVG(s.kpi_a_value) as avg_a,
            AVG(s.kpi_c_value) as avg_c,
            AVG(s.kpi_d_value) as avg_d,
                l.*,
                l.result as page_result,
                SUM(s.kpi_a_value) kpi_a_value,
                SUM(s.kpi_b_value) kpi_b_value,
                SUM(s.kpi_c_value) kpi_c_value,
                SUM(s.kpi_d_value) kpi_d_value,
                SUM(s.kpi_e_value) kpi_e_value,
                SUM(s.kpi_f_value) kpi_f_value,
                SUM(s.kpi_result) kpi_result,
                AVG(s.kpi_result) avg_result
            FROM ".$sum_table_name." s RIGHT JOIN kpi_list l ON s.kpi_id = l.id

            WHERE l.id = " . $kpi_id ." GROUP BY s.kpi_provcode";



        } elseif ($lv == 1) {
            $data = $connection->cache(function ($connection) use ($sum_table_name, $kpi_id) {
                return $connection->createCommand('
            SELECT s.id, p.provid,
                p.provname,
                s.kpi_a_value,
                s.kpi_a_value_q1,
                s.kpi_b_value,
                s.kpi_c_value,
                s.kpi_d_value,
                s.kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,
                s.attach_files, s.qwin_q1, s.qwin_q2, s.qwin_q3, s.qwin_q4, s.content_file, s.rep_q1, s.rep_q2, s.rep_q3, s.rep_q4,
s.last_update
            FROM co_province p
            JOIN
            (SELECT s.id, s.kpi_provcode,
                s.kpi_a_value,
                s.kpi_a_value_q1,
                s.kpi_b_value,
                s.kpi_c_value,
                s.kpi_d_value,
                s.kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,
                s.attach_files, s.qwin_q1, s.qwin_q2, s.qwin_q3, s.qwin_q4, s.content_file, s.rep_q1, s.rep_q2, s.rep_q3, s.rep_q4,
                s.last_update
            FROM '.$sum_table_name.' s
            WHERE s.kpi_id = ' . $kpi_id . '
            ) s ON p.provid = s.kpi_provcode
            ORDER BY p.provid

            ')->queryAll();
            },300, null);



            $sql = "SELECT AVG(s.kpi_a_value) as avg_a,
            AVG(s.kpi_c_value) as avg_c,
            AVG(s.kpi_d_value) as avg_d,
                l.*,
                l.result as page_result,
                SUM(s.kpi_a_value) kpi_a_value,
                SUM(s.kpi_b_value) kpi_b_value,
                SUM(s.kpi_c_value) kpi_c_value,
                SUM(s.kpi_d_value) kpi_d_value,
                SUM(s.kpi_e_value) kpi_e_value,
                SUM(s.kpi_f_value) kpi_f_value,
                SUM(s.kpi_result) kpi_result,
                AVG(s.kpi_result) avg_result
            FROM ".$sum_table_name." s RIGHT JOIN kpi_list l ON s.kpi_id = l.id
            WHERE l.id = " . $kpi_id.
            " GROUP BY s.kpi_provcode";

        } elseif ($lv == 2) {

            $postfix_title = "เขตฯ " . $z;

            $data = $connection->cache(function ($connection) use ($sum_table_name, $kpi_id, $z) {
                return $connection->createCommand('
            SELECT s.id, p.provid,
                p.provname,
                s.kpi_a_value,
                s.kpi_a_value_q1,
                s.kpi_b_value,
                s.kpi_c_value,
                s.kpi_d_value,
                s.kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,
attach_files,
qwin_q1,
qwin_q2,
qwin_q3,
qwin_q4,
content_file,
rep_q1,
rep_q2,
rep_q3,
rep_q4,
s.last_update
            FROM co_province p
            LEFT JOIN
            (SELECT s.id, s.kpi_provcode,
                s.kpi_a_value,
                s.kpi_a_value_q1,
                s.kpi_b_value,
                s.kpi_c_value,
                s.kpi_d_value,
                s.kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,

attach_files,
qwin_q1,
qwin_q2,
qwin_q3,
qwin_q4,
content_file,
rep_q1,
rep_q2,
rep_q3,
rep_q4,
                s.last_update
            FROM '.$sum_table_name.' s
            WHERE s.kpi_id = ' . $kpi_id . '
            ) s ON p.provid = s.kpi_provcode
            WHERE p.zoneid = "'.$z.'"
            ORDER BY p.provid

            ')->queryAll();
            },300, null);



            $sql = "SELECT AVG(s.kpi_a_value) as avg_a,
            AVG(s.kpi_c_value) as avg_c,
            AVG(s.kpi_d_value) as avg_d,
                l.*,
                l.result_r".$z." as page_result,
                SUM(s.kpi_a_value) kpi_a_value,
                SUM(s.kpi_b_value) kpi_b_value,
                SUM(s.kpi_c_value) kpi_c_value,
                SUM(s.kpi_d_value) kpi_d_value,
                SUM(s.kpi_e_value) kpi_e_value,
                SUM(s.kpi_f_value) kpi_f_value,
                SUM(s.kpi_result) kpi_result,
                AVG(s.kpi_result) avg_result
            FROM ".$sum_table_name." s RIGHT JOIN kpi_list l ON s.kpi_id = l.id
            WHERE l.id = " . $kpi_id ." AND s.kpi_provcode IN (SELECT provid FROM co_province WHERE zoneid = '".$z."')";




        } elseif ($lv == 9) {

            $postfix_title = "ประเทศไทย";

            $data = $connection->cache(function ($connection) use ($sum_table_name, $kpi_id, $z) {
                return $connection->createCommand('
            SELECT l.id, p.provid,
                p.provname,
                s.kpi_a_value,
                s.kpi_a_value_q1,
                s.kpi_b_value,
                s.kpi_c_value,
                s.kpi_d_value,
                s.kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,
                s.last_update
            FROM co_province p
            LEFT JOIN
            (SELECT s.kpi_provcode,
                s.kpi_a_value,
                s.kpi_a_value_q1,
                s.kpi_b_value,
                s.kpi_c_value,
                s.kpi_d_value,
                s.kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,
                s.last_update
            FROM '.$sum_table_name.' s
            WHERE s.kpi_id = ' . $kpi_id . '
            ) s ON p.provid = s.kpi_provcode
            WHERE p.zoneid = "'.$z.'"
            ORDER BY p.provid

            ')->queryAll();
            },300, null);



            $sql = "SELECT AVG(s.kpi_a_value) as avg_a,
            AVG(s.kpi_c_value) as avg_c,
            AVG(s.kpi_d_value) as avg_d,
                l.*,
                l.result_r".$z." as page_result,
                SUM(s.kpi_a_value) kpi_a_value,
                SUM(s.kpi_b_value) kpi_b_value,
                SUM(s.kpi_c_value) kpi_c_value,
                SUM(s.kpi_d_value) kpi_d_value,
                SUM(s.kpi_e_value) kpi_e_value,
                SUM(s.kpi_f_value) kpi_f_value,
                SUM(s.kpi_result) kpi_result,
                AVG(s.kpi_result) avg_result
            FROM ".$sum_table_name." s RIGHT JOIN kpi_list l ON s.kpi_id = l.id
            WHERE l.id = " . $kpi_id ." AND s.kpi_provcode IN (SELECT provid FROM co_province WHERE zoneid = '".$z."')";




        }

        $dependency = null;
//                $dependency = [
//                    'class' => 'yii\caching\DbDependency',
//                    'sql' => 'SELECT MAX(updated_at) FROM post',
//                ];

//      $start = microtime(true);
        $kpi = $connection->cache(function ($connection) USE ($sql){
            return $connection->createCommand($sql)->queryAll();
        },300, $dependency);
//      $time_elapsed_secs = microtime(true) - $start;





        $kpi_model = $connection->cache(function ($connection) USE ($kpi_id){
            return KpiList::findOne(['id' => $kpi_id]);
        },300, null);



        $hdc_date = 'N/A';
        $hdc_url = "#";
        if ($kpi_model->hdc == 1) {
            $hdc = \kpi\models\HdcSTable::findOne(['kpi_id' => ($kpi_model->parent_id > 0 ? $kpi_model->parent_id : $kpi_id)]);

            if ($hdc && $hdc->last_update) {
                $hdc_url = $hdc->hdc_url;
                $hdc_date = Yii::$app->thai->thaidate('j F Y H:i', strtotime($hdc->last_update)) ;//strtotime($hdc->last_update)//new DateTime($hdc->last_update)
            }

        }



        for ($i = 0; $i < sizeof($data); $i++) {
            $provname[] = $data[$i]['provname'];
            $kpiresult[] = ($data[$i]['kpi_result']) * 1;

        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            //'sort' => ['attributes' => ['provid', 'distname', '9m_total', '9m_result', 'mPER9', '18m_total', '18m_result', 'mPER18', '30m_total', '30m_result', 'mPER30', '42m_total', '42m_result', 'mPER42']],
        ]);




        $dataProvider->pagination->pageSize=100;



        $sql_map = "SELECT s.kpi_provcode,
	s.kpi_result AS kpi_result
FROM ".$sum_table_name." s
WHERE s.kpi_id = ". $kpi_id ."
GROUP BY s.kpi_provcode";



        $kpi_map = $connection->cache(function ($connection) USE ($sql_map){
            return $connection->createCommand($sql_map)->queryAll();
        },300, null);




        $sql = "SELECT *
FROM comments
WHERE comments.content_id = ". $kpi_id ."
ORDER BY comments.comment_date ASC";

        $comments = $connection->cache(function ($connection) USE ($sql){
            return $connection->createCommand($sql)->queryAll();
        },300, null);




        $model = new Comments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $kpi_id]);
        } else {
            $model->content_id = $kpi_id;
            return $this->render('index', [
                'model' => $model,
                'kpi_model' => $kpi_model,
                'dataProvider' => $dataProvider,
//                'kpiDataProvider' => $kpiDataProvider,
                'provname' => $provname,
                'kpiresult' => $kpiresult,
                'kpi' => $kpi,
                'kpi_map' => $kpi_map,
                'comments' => $comments,
                'postfix_title' => $postfix_title,
                'id' => $id,
                'lv' => $lv,
                'z' => $z,
                'embeded' =>$embeded,
                'title' => $title,
                'gauge' => $gauge,
                'gis' => $gis,
                'chart' => $chart,
                'table' => $table,
                'desc' => $desc,
                'comment' => $comment,
                'hdc_date' => $hdc_date,
                'hdc_url' => $hdc_url,

            ]);
        }


    }


    public function actionRecalresult()
    {


        $sql = "
        SELECT kpi_sum.id,
        kpi_sum.kpi_a_value,
	kpi_sum.kpi_b_value,
	kpi_sum.kpi_c_value,
	kpi_sum.kpi_d_value,
	kpi_sum.kpi_e_value,
	kpi_sum.kpi_f_value,
	kpi_sum.kpi_result,
	kpi_list.formula
FROM kpi_sum INNER JOIN kpi_list ON kpi_sum.kpi_id = kpi_list.id
WHERE
	kpi_list.formula IS NOT NULL

	";
        $connection = Yii::$app->db_kpi;
        $kpi = $connection->createCommand($sql)->queryAll();




        for ($i = 0; $i < sizeof($kpi); $i++) {

            $a = $kpi[$i]['kpi_a_value'];
            $b = $kpi[$i]['kpi_b_value'];
            $c = $kpi[$i]['kpi_c_value'];
            $d = $kpi[$i]['kpi_d_value'];
            $e = $kpi[$i]['kpi_e_value'];
            $f = $kpi[$i]['kpi_f_value'];


            $formula = str_replace("A", $a, $kpi[$i]['formula']);
            $formula = str_replace("B", $b, $formula);
            $formula = str_replace("C", $c, $formula);
            $formula = str_replace("D", $d, $formula);
            $formula = str_replace("E", $e, $formula);
            $formula = str_replace("F", $f, $formula);
            $formula = str_replace(",", "", $formula);
            $formula = str_replace("x", "*", $formula);
            $formula = str_replace("X", "*", $formula);

            //if ($a > 0 && $b > 0) {

                //$value = eval('return ' . $formula.';');


                $kpi_sum = KpiSum::findOne($kpi[$i]['id']);
                //$kpi_sum->kpi_result = $value;

                @trigger_error(''); // a dummy to detect when error didn't occur
                @(eval('return ' . $formula.';'));
                $e = error_get_last();
                if ($e['message'] != '') {
                    $kpi_sum->kpi_result = null;
                } else {
                    $value = eval('return ' . $formula.';');

                    $kpi_sum->kpi_result = $value;
                }

                $kpi_sum->save();

            //}


        }


        return $this->render('error', []);

    }



    public function actionGis($id, $lv = 0, $z = "06")
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //$items = ['some', 'array', 'of', 'data' => ['associative', 'array']];

        $kpi_id = $id;



        $kpi_list = KpiList::findOne(['id' => $id]);

        $sum_table_name = 'kpi_sum';
        if ($kpi_list->hosp_visible == '') {
            switch ($kpi_list->kpi_level) {
                case "ประเทศ":
                    $sum_table_name = 'kpi_sum_moph';
                    break;
                case "สป.":
                    $sum_table_name = 'kpi_sum_moph';
                    break;
                case "กรม":
                    $sum_table_name = 'kpi_sum_moph';
                    break;
                case "เขต":
                    $sum_table_name = 'kpi_sum_region';
                    break;
                case "จังหวัด":
                    $sum_table_name = 'kpi_sum';
                    break;


            }

        }


        $connection = Yii::$app->db_kpi;



        if ($lv == 0) {



            $data = $connection->cache(function ($connection) USE ($sum_table_name, $kpi_id, $z){
                return $connection->createCommand('
           SELECT p.zoneid AS provid,
                CONCAT("เขตฯ ",p.zoneid) AS provname,
                SUM(s.kpi_a_value) kpi_a_value,
                SUM(s.kpi_a_value_q1) kpi_a_value_q1,
                SUM(s.kpi_b_value) kpi_b_value,
                SUM(s.kpi_c_value) kpi_c_value,
                SUM(s.kpi_d_value) kpi_d_value,
IF(p.zoneid = "01", l.result_r01_q1, IF(p.zoneid = "02", l.result_r02_q1, IF(p.zoneid = "03", l.result_r03_q1, IF(p.zoneid = "04", l.result_r04_q1, IF(p.zoneid = "05", l.result_r05_q1,
IF(p.zoneid = "06", l.result_r06_q1, IF(p.zoneid = "07", l.result_r07_q1, IF(p.zoneid = "08", l.result_r08_q1, IF(p.zoneid = "09", l.result_r09_q1, IF(p.zoneid = "10", l.result_r10_q1,
IF(p.zoneid = "11", l.result_r11_q1, IF(p.zoneid = "12", l.result_r12_q1, IF(p.zoneid = "13", l.result_r13_q1, 0))))))))))))) AS kpi_result_q1,

IF(p.zoneid = "01", l.result_r01_q2, IF(p.zoneid = "02", l.result_r02_q2, IF(p.zoneid = "03", l.result_r03_q2, IF(p.zoneid = "04", l.result_r04_q2, IF(p.zoneid = "05", l.result_r05_q2,
IF(p.zoneid = "06", l.result_r06_q2, IF(p.zoneid = "07", l.result_r07_q2, IF(p.zoneid = "08", l.result_r08_q2, IF(p.zoneid = "09", l.result_r09_q2, IF(p.zoneid = "10", l.result_r10_q2,
IF(p.zoneid = "11", l.result_r11_q2, IF(p.zoneid = "12", l.result_r12_q2, IF(p.zoneid = "13", l.result_r13_q2, 0))))))))))))) AS kpi_result_q2,

IF(p.zoneid = "01", l.result_r01_q3, IF(p.zoneid = "02", l.result_r02_q3, IF(p.zoneid = "03", l.result_r03_q3, IF(p.zoneid = "04", l.result_r04_q3, IF(p.zoneid = "05", l.result_r05_q3,
IF(p.zoneid = "06", l.result_r06_q3, IF(p.zoneid = "07", l.result_r07_q3, IF(p.zoneid = "08", l.result_r08_q3, IF(p.zoneid = "09", l.result_r09_q3, IF(p.zoneid = "10", l.result_r10_q3,
IF(p.zoneid = "11", l.result_r11_q3, IF(p.zoneid = "12", l.result_r12_q3, IF(p.zoneid = "13", l.result_r13_q3, 0))))))))))))) AS kpi_result_q3,

IF(p.zoneid = "01", l.result_r01_q4, IF(p.zoneid = "02", l.result_r02_q4, IF(p.zoneid = "03", l.result_r03_q4, IF(p.zoneid = "04", l.result_r04_q4, IF(p.zoneid = "05", l.result_r05_q4,
IF(p.zoneid = "06", l.result_r06_q4, IF(p.zoneid = "07", l.result_r07_q4, IF(p.zoneid = "08", l.result_r08_q4, IF(p.zoneid = "09", l.result_r09_q4, IF(p.zoneid = "10", l.result_r10_q4,
IF(p.zoneid = "11", l.result_r11_q4, IF(p.zoneid = "12", l.result_r12_q4, IF(p.zoneid = "13", l.result_r13_q4, 0))))))))))))) AS kpi_result_q4,

l.result,
IF(p.zoneid = "01", l.result_r01, IF(p.zoneid = "02", l.result_r02, IF(p.zoneid = "03", l.result_r03, IF(p.zoneid = "04", l.result_r04, IF(p.zoneid = "05", l.result_r05,
IF(p.zoneid = "06", l.result_r06, IF(p.zoneid = "07", l.result_r07, IF(p.zoneid = "08", l.result_r08, IF(p.zoneid = "09", l.result_r09, IF(p.zoneid = "10", l.result_r10,
IF(p.zoneid = "11", l.result_r11, IF(p.zoneid = "12", l.result_r12, IF(p.zoneid = "13", l.result_r13, 0))))))))))))) AS kpi_result,

                MAX(s.last_update) AS last_update,
                g.*
            FROM co_province p
            JOIN geojson g ON g.areacode = p.zoneid AND g.areatype = 1
            LEFT JOIN
            (SELECT s.kpi_provcode,
                s.kpi_a_value,
                s.kpi_a_value_q1,
                s.kpi_b_value,
                s.kpi_c_value,
                s.kpi_d_value,
                s.kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,
                s.last_update
            FROM '.$sum_table_name.' s
            WHERE s.kpi_id = ' . $kpi_id . '
            ) s ON p.provid = s.kpi_provcode
LEFT JOIN kpi_list l ON l.id = ' . $kpi_id . '
            GROUP BY p.zoneid
            ORDER BY p.zoneid

            ')->queryAll();
            },300, null);



        } elseif ($lv == 1) {
            $data = $connection->cache(function ($connection) USE ($sum_table_name, $kpi_id, $z){
                return $connection->createCommand('
            SELECT p.provid,
                p.provname,
                IF(s.kpi_a_value IS NULL, 0, s.kpi_a_value) kpi_a_value,
                IF(s.kpi_a_value_q1 IS NULL, 0, s.kpi_a_value_q1) kpi_a_value_q1,
                IF(s.kpi_b_value IS NULL, 0, s.kpi_b_value) kpi_b_value,
                IF(s.kpi_c_value IS NULL, 0, s.kpi_c_value) kpi_c_value,
                IF(s.kpi_d_value IS NULL, 0, s.kpi_d_value) kpi_d_value,
                kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,
                s.last_update,
                g.*
            FROM co_province p
            JOIN geojson g ON g.areacode = p.provid AND g.areatype = 2
            LEFT JOIN
            (SELECT s.kpi_provcode,
                s.kpi_a_value,
                s.kpi_a_value_q1,
                s.kpi_b_value,
                s.kpi_c_value,
                s.kpi_d_value,
                s.kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,
                s.last_update
            FROM '.$sum_table_name.' s
            WHERE s.kpi_id = ' . $kpi_id . '
            ) s ON p.provid = s.kpi_provcode
            ORDER BY p.provid

            ')->queryAll();
            },300, null);


        } elseif ($lv == 2) {

            $postfix_title = "เขตฯ " . $z;

            $data = $connection->cache(function ($connection) USE ($sum_table_name, $kpi_id, $z){
                return $connection->createCommand('
            SELECT p.provid,
                p.provname,
                IF(s.kpi_a_value IS NULL, 0, s.kpi_a_value) kpi_a_value,
                IF(s.kpi_a_value_q1 IS NULL, 0, s.kpi_a_value_q1) kpi_a_value_q1,
                IF(s.kpi_b_value IS NULL, 0, s.kpi_b_value) kpi_b_value,
                IF(s.kpi_c_value IS NULL, 0, s.kpi_c_value) kpi_c_value,
                IF(s.kpi_d_value IS NULL, 0, s.kpi_d_value) kpi_d_value,
                kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,
                s.last_update,
                g.*
            FROM co_province p
            JOIN geojson g ON g.areacode = p.provid AND g.areatype = 2
            LEFT JOIN
            (SELECT s.kpi_provcode,
                s.kpi_a_value,
                s.kpi_a_value_q1,
                s.kpi_b_value,
                s.kpi_c_value,
                s.kpi_d_value,
                s.kpi_result,
                s.kpi_result_q1,
                s.kpi_result_q2,
                s.kpi_result_q3,
                s.kpi_result_q4,
                s.last_update
            FROM '.$sum_table_name.' s
            WHERE s.kpi_id = ' . $kpi_id . '
            ) s ON p.provid = s.kpi_provcode
            WHERE p.zoneid = "'.$z.'"
            ORDER BY p.provid

            ')->queryAll();
            },300, null);



        } elseif ($lv == 9) {

            $postfix_title = "ประเทศไทย";

            $data = $connection->cache(function ($connection) USE ($sum_table_name, $kpi_id, $z){
                return $connection->createCommand('
            SELECT
"00" AS provid,
"ประเทศไทย" AS provname,
s.kpi_a_value,
s.kpi_b_value,
s.kpi_c_value,
s.kpi_d_value,
s.kpi_e_value,
s.kpi_f_value,
s.kpi_result,
s.kpi_result_q1,
s.kpi_result_q2,
s.kpi_result_q3,
s.kpi_result_q4,
s.last_update,
g.*
FROM
geojson g,
kpi_sum_moph s
WHERE
g.areatype = 0
AND s.kpi_id = ' . $kpi_id . '
GROUP BY g.areatype

            ')->queryAll();
            },300, null);



        }


        $options = [];
        for ($i = 0; $i < sizeof($data); $i++) {
//            $provname[] = $data[$i]['provname'];
//            $kpiresult[] = ($data[$i]['kpi_result']) * 1;
            $options[] = ['type'=> 'Feature', 'properties'=> ['id'=> $data[$i]['provid'], 'type'=> $data[$i]['areatype'], 'name' => $data[$i]['provname'], 'zone'=> $data[$i]['areacode'], 'data'=> $data[$i]['kpi_result']], 'geometry'=> Json::decode(stripslashes($data[$i]['geojson']))];

        }


//        foreach ($data AS $d) {
//            $options[] .= ['type'=> 'Feature', 'properties'=> ['id'=> $d['provid'], 'type'=> $d['areatype'], 'name' => $d['provname'], 'zone'=> $d['areacode'], 'data'=> $d['kpi_result']], 'geometry'=> stripslashes($d['geojson'])];
//        }


        $json = ['type' => 'FeatureCollection', 'features' => $options];


        return $json;

    }


    public function actionUpdateDistrict()
    {

        $prov = '';
        if (isset($_POST['prov'])) {
            $prov = $_POST['prov'];
        }


        $ar = new ActiveResponse();


        if (empty($prov)) {
            $ar->script("
            var options = $('#s-district');
            options.html('');
            options.select2('val', '');

            var options = $('#s-hospcode');
            options.html('');
            options.select2('val', '');

            var options = $('#s-cup');
            options.html('');
            options.select2('val', '');
            ");


        } else {
            //$dist = \common\models\Profile::getDistrictArray($prov);

            $dist = ArrayHelper::map(Profile::getDistrictArray($prov), 'ampurcodefull', 'ampurname');
            //$dist = \common\models\CDistrict::find()->select(['ampurcode', 'ampurname'])->where(['changwatcode' => $prov])->orderBy('ampurname')->all();
            $js = '';
            foreach ($dist as $key => $value) {
                $js .= "options.append($('<option/>').val('" . $key . "').text('" . $value . "'));";
            }

            $ar->script("
            var options = $('#s-district');
            options.html('');
            " . $js . "
            options.select2('val', '');
            ");

            $hosp = \common\models\Profile::getHosArray($prov);
            $js = '';
            foreach ($hosp as $key => $value) {
                $js .= "options.append($('<option/>').val('" . $key . "').text('" . $value . "'));";
            }

            $ar->script("
            var options = $('#s-hospcode');
            options.html('');
            " . $js . "
            options.select2('val', '');
            ");

            $hosp = \common\models\Profile::getCupArray($prov);
            $js = '';
            foreach ($hosp as $key => $value) {
                $js .= "options.append($('<option/>').val('" . $key . "').text('" . $value . "'));";
            }

            $ar->script("
            var options = $('#s-cup');
            options.html('');
            " . $js . "
            options.select2('val', '');
            ");


        }

        return $ar;
    }

    public function actionUpdateSubdistrict()
    {

        $prov = '';
        if (isset($_POST['prov'])) {
            $prov = $_POST['prov'];
        }

        $district = '';
        if (isset($_POST['district'])) {
            $district = $_POST['district'];
        }


        $ar = new ActiveResponse();


        if (empty($district)) {
            $ar->script("
            var options = $('#s-subdistrict');
            options.html('');
            options.select2('val', '');

            ");

            if (!empty($prov)) {
                $hosp = \common\models\Profile::getHosArray($prov);
                $js = '';
                foreach ($hosp as $key => $value) {
                    $js .= "options.append($('<option/>').val('" . $key . "').text('" . $value . "'));";
                }

                $ar->script("
                var options = $('#s-hospcode');
                options.html('');
                " . $js . "
                options.select2('val', '');
                ");
            }

        } else {


            $subdist = ArrayHelper::map(Profile::getSubdistrictArray($district), 'tamboncodefull', 'tambonname');

            $js = '';
            foreach ($subdist as $key => $value) {
                $js .= "options.append($('<option/>').val('" . $key . "').text('" . $value . "'));";
            }

            $ar->script("
            var options = $('#s-subdistrict');
            options.html('');
            " . $js . "
            options.select2('val', '');
            ");

            $hosp = \common\models\Profile::getHosArray($prov, substr($district, 2, 2));
            $js = '';
            foreach ($hosp as $key => $value) {
                $js .= "options.append($('<option/>').val('" . $key . "').text('" . $value . "'));";
            }

            $ar->script("
            var options = $('#s-hospcode');
            options.html('');
            " . $js . "
            options.select2('val', '');
            ");

        }

        return $ar;
    }


    public function createMophBucket($id, $kpi_no, $kpi_year)
    {

    }


    public function createRegionBucket($id, $kpi_no, $kpi_year)
    {
        $sql = "
INSERT IGNORE INTO kpi.kpi_sum_region (hospcode, kpi_year, kpi_no, kpi_id, kpi_provcode)
SELECT
c_hospital.hoscode,
'".$kpi_year."' gov_year,
'".$kpi_no."' as kpi_no,
".$id." as kpi_id,
c_hospital.provcode
FROM
c_hospital
WHERE
c_hospital.hostype = '19'

	";
        $connection = Yii::$app->db;
        $connection->createCommand($sql)->execute();
    }

    public function createProvinceBucket($id, $kpi_no, $kpi_year)
    {
        $sql = "
INSERT IGNORE INTO kpi.kpi_sum (hospcode, kpi_year, kpi_no, kpi_id, kpi_provcode)
SELECT
c_hospital.hoscode,
'".$kpi_year."' gov_year,
'".$kpi_no."' as kpi_no,
".$id." as kpi_id,
c_hospital.provcode
FROM
c_hospital
WHERE
c_hospital.hostype = '01'

	";
        $connection = Yii::$app->db;
        $connection->createCommand($sql)->execute();
    }


    public function createDistrictBucket($id, $kpi_no, $kpi_year)
    {
        $sql = "
INSERT IGNORE INTO kpi.kpi_sum (hospcode, kpi_year, kpi_no, kpi_id, kpi_provcode)
SELECT
c_hospital.hoscode,
'".$kpi_year."' gov_year,
'".$kpi_no."' as kpi_no,
".$id." as kpi_id,
c_hospital.provcode
FROM
c_hospital
WHERE
c_hospital.hostype = '02'

	";
        $connection = Yii::$app->db;
        $connection->createCommand($sql)->execute();
    }

    public function createHospBucket($sum_table, $id, $kpi_no, $kpi_year, $hosptype)
    {
        $sql = "
INSERT IGNORE INTO kpi.".$sum_table." (hospcode, kpi_year, kpi_no, kpi_id, kpi_provcode)
SELECT
c_hospital.hoscode,
'".$kpi_year."' gov_year,
'".$kpi_no."' as kpi_no,
".$id." as kpi_id,
c_hospital.provcode
FROM
c_hospital
WHERE
c_hospital.hostype IN (".$hosptype.");
	";


        $connection = Yii::$app->db;
        $connection->createCommand($sql)->execute();
    }


    public function createSpecificHospBucket($sum_table , $id, $kpi_no, $kpi_year, $hospcode)
    {

        $sql = "
INSERT IGNORE INTO kpi.".$sum_table." (hospcode, kpi_year, kpi_no, kpi_id, kpi_provcode)
SELECT
c_hospital.hoscode,
'".$kpi_year."' gov_year,
'".$kpi_no."' as kpi_no,
".$id." as kpi_id,
c_hospital.provcode
FROM
c_hospital
WHERE
c_hospital.hoscode IN (".$hospcode.");

	";


        $connection = Yii::$app->db;
        $connection->createCommand($sql)->execute();
    }


    public function actionCreateDataTable($id)
    {

        $kpi_list = KpiList::findOne(['id' => $id]);



        $sum_table = '';
        switch ($kpi_list->kpi_level) {
            case "ประเทศ":
//                $this->createHospBucket($id, $kpi_list->kpi_no, $kpi_list->kpi_year);
                $sum_table = 'kpi_sum_moph';
                break;
            case "สป.":
//                $this->createHospBucket($id, $kpi_list->kpi_no, $kpi_list->kpi_year);
                $sum_table = 'kpi_sum_moph';
                break;
            case "กรม":
//                $this->createHospBucket($id, $kpi_list->kpi_no, $kpi_list->kpi_year);
                $sum_table = 'kpi_sum_moph';
                break;
            case "เขต":
//                $this->createRegionBucket($id, $kpi_list->kpi_no, $kpi_list->kpi_year);
                $sum_table = 'kpi_sum_region';
                break;
            case "จังหวัด":
//                $this->createProvinceBucket($id, $kpi_list->kpi_no, $kpi_list->kpi_year);
                $sum_table = 'kpi_sum';
                break;
        }


        if ($kpi_list->hosp_visible != '') {

            $hosptype = explode(',', str_replace(' ', '', $kpi_list->hosp_visible) );
            foreach ($hosptype as &$value) {
                $value = '"'.$value .'"';
            }

            $this->createHospBucket($sum_table, $id, $kpi_list->kpi_no, $kpi_list->kpi_year, implode(',',$hosptype));
        }


        if ($kpi_list->hosp_specifics != '') {

            $hospcode = explode(',', $kpi_list->hosp_specifics);
            foreach ($hospcode as &$value) {
                $value = '"'.$value .'"';
            }

            $this->createSpecificHospBucket($sum_table, $id, $kpi_list->kpi_no, $kpi_list->kpi_year, implode(',',$hospcode));
        }





        return $this->render('/site/about', []);

    }

}