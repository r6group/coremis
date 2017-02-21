<?php

namespace app\modules\hrm\controllers;

use Yii;
use common\models\Profile;
use app\modules\hrm\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ArrayDataProvider;
use common\models\CHospital;


/**
 * HrmController implements the CRUD actions for Profile model.
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'fileapi-upload' => [
                'class' => FileAPIUpload::className(),
                'path' => Profile::AVATAR_UPLOAD_TEMP_PATH,
            ]
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */


    function actionIndex()
    {
        $searchModel = new ProfileSearch;
        $query = $searchModel->search(Yii::$app->request->getQueryParams());
        $hrm_title = Yii::$app->getRequest()->getQueryParam('hrm_title');


        //$query = Profile::find()->where(['off_id' => '00017']);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        //$pages->pageCount
        return $this->render('index', [
            //'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'models' => $models,
            'pages' => $pages,
            'hrm_title' => $hrm_title,

        ]);
    }


    public function actionHospitalList($q = '###', $page = 1)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $connection = Yii::$app->db;

        $sql = "select hoscode as id, hoscode, hosname
from c_hospital
where hoscode like '%".$q."%' or hosname like '%".$q."%' or hosname_long like '%".$q."%'
limit 30 offset ".(($page -1) * 30);


        $qryhrm = $connection->createCommand($sql)->queryAll();

        $sql = "select COUNT(*) as total
from c_hospital
where hoscode like '%".$q."%' or hosname like '%".$q."%' or hosname_long like '%".$q."%'";
        $qrycount = $connection->createCommand($sql)->queryAll();

        $result = ['total_count' => $qrycount[0]['total'], 'incomplete_results'=> false, 'items' => $qryhrm];

        return $result;
    }


    public function actionMap($provcode, $main_pst = null, $dr_special = null, $item_code = null){

        $condition = '';
        $map_title = '';
        $sql = '';
        if ($main_pst != null) {
            $condition = '`profile`.main_pst = "'.$main_pst.'" AND ';
            $map_title = 'ตำแหน่ง: '.ArrayHelper::getValue(Profile::getPositionArray(), $main_pst, 'ไม่ระบุตำแหน่ง');
        } else if($dr_special != null) {
            $condition = '`profile`.dr_special = "' . $dr_special . '" AND ';
            $map_title = 'สาขาเฉพาะทาง: '.ArrayHelper::getValue(Profile::getSpArray(), $main_pst, 'ไม่ระบุสาขาเฉพาะทาง');
        }


        if($item_code != null) {
            $map_title = 'เครื่องมือแพทย์: ';
            $sql = "SELECT
c_hospital.hoscode,
c_hospital.hosname_long,
health_items.id,
COUNT(health_items.id) AS stf_count,
c_health_items.item_name stf_list,
c_hospital.h_latitude,
c_hospital.h_longitude
FROM
c_hospital
JOIN health_items
ON c_hospital.hoscode = health_items.off_id
JOIN c_health_items
ON health_items.item_code = c_health_items.item_code
WHERE
c_health_items.item_code = '".$item_code."' AND c_hospital.provcode IN (".$provcode.")
GROUP BY
health_items.item_code, c_hospital.hoscode";

        } else {
            $sql = "SELECT
`profile`.off_id,
c_hospital.hosname_long,
`profile`.id,
COUNT(`profile`.id) AS stf_count,
GROUP_CONCAT(CONCAT('<br>',
`profile`.`name`,' ',
`profile`.surname, ', ',
c_titles.title_Desc)) stf_list,
c_hospital.h_latitude,
c_hospital.h_longitude
FROM
c_hospital
JOIN `profile`
ON c_hospital.hoscode = `profile`.off_id
LEFT JOIN c_titles
ON `profile`.pname = c_titles.title_Code
WHERE
".$condition."c_hospital.provcode IN (".$provcode.")
GROUP BY
`profile`.off_id;";
        }


        $connection = Yii::$app->db;
        $qryhrm = $connection->createCommand($sql)->queryAll();


        return $this->render('map', [
            'model' => $qryhrm,
            'map_title' => $map_title
        ]);

    }


    public function actionReport()
    {
        $searchModel = new ProfileSearch;
        $connection = Yii::$app->db;
        $qryhrm = $connection->createCommand("SELECT
c_position.poscode,
c_position.full_posname,
IFNULL(c.p11,0) AS 'สมุทรปราการ',
IFNULL(c.p20,0) AS 'ชลบุรี',
IFNULL(c.p21,0) AS 'ระยอง',
IFNULL(c.p22,0) AS 'จันทบุรี',
IFNULL(c.p23,0) AS 'ตราด',
IFNULL(c.p24,0) AS 'ฉะเชิงเทรา',
IFNULL(c.p25,0) AS 'ปราจีนบุรี',
IFNULL(c.p27,0) AS 'สระแก้ว',
IFNULL(c.total,0) AS 'รวม'
FROM
c_position
LEFT JOIN (SELECT

`profile`.main_pst,
SUM(IF(c_hospital.provcode = '11',1,0 )) p11,
SUM(IF(c_hospital.provcode = '20',1,0 )) p20,
SUM(IF(c_hospital.provcode = '21',1,0 )) p21,
SUM(IF(c_hospital.provcode = '22',1,0 )) p22,
SUM(IF(c_hospital.provcode = '23',1,0 )) p23,
SUM(IF(c_hospital.provcode = '24',1,0 )) p24,
SUM(IF(c_hospital.provcode = '25',1,0 )) p25,
SUM(IF(c_hospital.provcode = '27',1,0 )) p27,
 COUNT(id) AS total
FROM
`profile`, c_hospital
WHERE
`profile`.off_id = c_hospital.hoscode AND
c_hospital.provcode IN (11,20,21,22,23,24,25,27) AND
`profile`.main_pst in (SELECT
c_position.poscode
FROM
c_position
WHERE
`show_report32` = '1' OR `show_report64` = '1'
ORDER BY
c_position.sort_order ASC)
GROUP BY
`profile`.main_pst

) c ON c_position.poscode = c.main_pst
WHERE
`show_report32` = '1' OR `show_report64` = '1'
ORDER BY
c_position.sort_order ASC;


")->queryAll();


        $dataProvider = new ArrayDataProvider([
            'allModels' => $qryhrm,
            'pagination' => [
                'pageSize' => 200,
            ],
            'sort' => ['attributes' => ['full_posname', 'สมุทรปราการ', 'ชลบุรี', 'ระยอง',
                'จันทบุรี', 'ตราด', 'ฉะเชิงเทรา',
                'ปราจีนบุรี', 'สระแก้ว', 'รวม']
            ],
        ]);
        return $this->render('report', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'model' => $qryhrm
        ]);
    }



    public function actionReportPos()
    {
        $searchModel = new ProfileSearch;
        $connection = Yii::$app->db;
        $qryhrm = $connection->createCommand("SELECT
c_position.poscode,
c_position.full_posname,
IFNULL(c.p11,0) AS 'สมุทรปราการ',
IFNULL(c.p20,0) AS 'ชลบุรี',
IFNULL(c.p21,0) AS 'ระยอง',
IFNULL(c.p22,0) AS 'จันทบุรี',
IFNULL(c.p23,0) AS 'ตราด',
IFNULL(c.p24,0) AS 'ฉะเชิงเทรา',
IFNULL(c.p25,0) AS 'ปราจีนบุรี',
IFNULL(c.p27,0) AS 'สระแก้ว',
IFNULL(c.total,0) AS 'รวม'
FROM
c_position
LEFT JOIN (SELECT

`profile`.main_pst,
SUM(IF(c_hospital.provcode = '11',1,0 )) p11,
SUM(IF(c_hospital.provcode = '20',1,0 )) p20,
SUM(IF(c_hospital.provcode = '21',1,0 )) p21,
SUM(IF(c_hospital.provcode = '22',1,0 )) p22,
SUM(IF(c_hospital.provcode = '23',1,0 )) p23,
SUM(IF(c_hospital.provcode = '24',1,0 )) p24,
SUM(IF(c_hospital.provcode = '25',1,0 )) p25,
SUM(IF(c_hospital.provcode = '27',1,0 )) p27,
 COUNT(id) AS total
FROM
`profile`, c_hospital
WHERE
`profile`.off_id = c_hospital.hoscode AND
c_hospital.provcode IN (11,20,21,22,23,24,25,27) AND
`profile`.main_pst in (SELECT
c_position.poscode
FROM
c_position
WHERE
`show_report32` = '1' OR `show_report64` = '1'
ORDER BY
c_position.sort_order ASC)
GROUP BY
`profile`.main_pst

) c ON c_position.poscode = c.main_pst
WHERE
`show_report32` = '1' OR `show_report64` = '1'
ORDER BY
c_position.sort_order ASC;


")->queryAll();


        $dataProvider = new ArrayDataProvider([
            'allModels' => $qryhrm,
            'pagination' => [
                'pageSize' => 200,
            ],
            'sort' => ['attributes' => ['full_posname', 'สมุทรปราการ', 'ชลบุรี', 'ระยอง',
                'จันทบุรี', 'ตราด', 'ฉะเชิงเทรา',
                'ปราจีนบุรี', 'สระแก้ว', 'รวม']
            ],
        ]);
        return $this->render('report_pos', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'model' => $qryhrm
        ]);
    }




    public function actionReportSpecial()
    {
        $searchModel = new ProfileSearch;
        $connection = Yii::$app->db;
        $qryhrm = $connection->createCommand("SELECT
c_spcode.spcode,
c_spcode.groupid,
c_spcode.spdesc,
IFNULL(c.p11,0) AS 'สมุทรปราการ',
IFNULL(c.p20,0) AS 'ชลบุรี',
IFNULL(c.p21,0) AS 'ระยอง',
IFNULL(c.p22,0) AS 'จันทบุรี',
IFNULL(c.p23,0) AS 'ตราด',
IFNULL(c.p24,0) AS 'ฉะเชิงเทรา',
IFNULL(c.p25,0) AS 'ปราจีนบุรี',
IFNULL(c.p27,0) AS 'สระแก้ว',
IFNULL(c.total,0) AS 'รวม'
FROM
c_spcode
LEFT JOIN (SELECT
`profile`.dr_special,
SUM(IF(c_hospital.provcode = '11',1,0 )) p11,
SUM(IF(c_hospital.provcode = '20',1,0 )) p20,
SUM(IF(c_hospital.provcode = '21',1,0 )) p21,
SUM(IF(c_hospital.provcode = '22',1,0 )) p22,
SUM(IF(c_hospital.provcode = '23',1,0 )) p23,
SUM(IF(c_hospital.provcode = '24',1,0 )) p24,
SUM(IF(c_hospital.provcode = '25',1,0 )) p25,
SUM(IF(c_hospital.provcode = '27',1,0 )) p27,
 COUNT(id) AS total
FROM
`profile`
JOIN c_hospital
ON `profile`.off_id = c_hospital.hoscode
WHERE
c_hospital.provcode IN (11,20,21,22,23,24,25,27)
AND `profile`.dr_special IS NOT NULL
GROUP BY `profile`.dr_special) c ON c_spcode.spcode = c.dr_special
ORDER BY
c_spcode.groupid ASC;


")->queryAll();


        $dataProvider = new ArrayDataProvider([
            'allModels' => $qryhrm,
            'pagination' => [
                'pageSize' => 200,
            ],
            'sort' => ['attributes' => ['spdesc', 'สมุทรปราการ', 'ชลบุรี', 'ระยอง',
                'จันทบุรี', 'ตราด', 'ฉะเชิงเทรา',
                'ปราจีนบุรี', 'สระแก้ว', 'รวม']
            ],
        ]);
        return $this->render('report_special', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'model' => $qryhrm
        ]);
    }
    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $app_id = null)
    {
        $model = $this->findModel($id);


        if (!is_null($app_id)) {
            $this->layout = '../../../../../phi/themes/quirk/layouts/main';
        }



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profile;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$model->setScenario('frontend-update-own');

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Data successfully changed');

            return $this->refresh();
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        //return $this->render('update', ['profile' => $model]);


        //$model = $this->findModel($id);

        $district = ArrayHelper::map(Profile::getDistrictArray($model->chw_part), 'ampurcodefull', 'ampurname');
        $subdistrict = ArrayHelper::map(Profile::getSubdistrictArray($model->amp_part), 'tamboncodefull', 'tambonname');


//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
        return $this->render('update', [
            'model' => $model,
            'district' => $district,
            'subdistrict' => $subdistrict
        ]);

    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionGetDistrict()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = $this->MapData(Profile::getDistrictArray($province_id), 'ampurcodefull', 'ampurname');
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }


    public function actionGetSubdistrict()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
                $out = $this->MapData(Profile::getSubdistrictArray($amphur_id), 'tamboncodefull', 'tambonname');
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }


    protected function MapData($datas, $fieldId, $fieldName)
    {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }
}
