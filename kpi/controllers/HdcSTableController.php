<?php

namespace kpi\controllers;

use kpi\models\KpiList;
use kpi\models\KpiSum;
use kpi\models\KpiSumMoph;
use kpi\models\KpiSumRegion;
use Yii;
use yii\filters\AccessControl;
use kpi\models\HdcSTable;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kpi\models\HdcSummary;


/**
 * HdcSTableController implements the CRUD actions for HdcSTable model.
 */
class HdcSTableController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view', 'delete', 'get-hdc-summary'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'get-hdc-summary'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function beforeAction($event)
    {

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return parent::beforeAction($event);
    }


    /**
     * Lists all HdcSTable models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => HdcSTable::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionGetHdcSummary($table_name) {


        $Url = 'http://hie.moph.go.th/api/v1/request';
        $content['request'] = "token-create";
        $content['apiKey'] = \Yii::$app->params['apiKey'];
        $content['secretKey'] = \Yii::$app->params['secretKey'];
        $Req = curl_init();
        curl_setopt($Req, CURLOPT_URL, $Url);
        curl_setopt($Req, CURLOPT_POST, 1);
        curl_setopt($Req, CURLOPT_POSTFIELDS,http_build_query($content));
        curl_setopt($Req, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($Req, CURLOPT_SSL_VERIFYPEER, 0);
        $server_output = curl_exec ($Req);
        curl_close ($Req);

        $token =json_decode($server_output,true)['token'];


        $Url = 'http://hie.moph.go.th/api/v1/report';
        $content['token'] = $token;
        $content['id'] = "-1";
        $content['year'] = "2560";
        $content['hospcode'] = "" ;
        $content['areacode'] = "" ;
        $content['tablename'] = $table_name ;
        $content['offset'] = "0" ;
        $content['limit'] = "1000000" ;
        $Req = curl_init();
        curl_setopt($Req, CURLOPT_URL, $Url);
        curl_setopt($Req, CURLOPT_POST, 1);
        curl_setopt($Req, CURLOPT_POSTFIELDS,http_build_query($content));
        curl_setopt($Req, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($Req, CURLOPT_SSL_VERIFYPEER, 0);
        $server_output = curl_exec ($Req);
        curl_close ($Req);

        $sql = 'SELECT GROUP_CONCAT(COLUMN_NAME) n FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$table_name.'"';

        $connection = Yii::$app->db_kpi;
        $fields_name = $connection->createCommand($sql)->queryAll()[0]['n'] ;

        $sql ='INSERT INTO '.$table_name.'('.$fields_name.') VALUES';



        if ($server_output) {
            $responseArray=json_decode($server_output,true)['data'];
            \Yii::$app->session['s_table_name'] = $table_name;
            HdcSummary::deleteAll();

            $i =0;
            $row_1000 = 0;
            $row_count = count($responseArray);

            foreach( $responseArray as  $response) {
                $i++;
                $row_1000++;
                $sql.='(';

                $fields_count = count($response);
                $n = 0;
                foreach ($response as $key => $value) {
                    $n++;
                    $sql.= '\''.$value.'\'';
                    if($n <> $fields_count) { $sql.= ',';}
                }

                $sql.=')';
                if($i <> $row_count && $row_1000 <> 1000) { $sql.= ',';}


                if ($row_1000 == 1000) {
                    $row_1000 = 0;

                    $connection->createCommand($sql)->execute();
                    $sql ='INSERT INTO '.$table_name.'('.$fields_name.') VALUES';

                }
            }

            if ($row_1000 > 0) {
                $connection = Yii::$app->db_kpi;
                $connection->createCommand($sql)->execute();
            }

            $hdc_table = HdcSTable::findOne(['table_name' => $table_name]);
            $hdc_table->status = 'Success ['.$i .' records]';
            $hdc_table->last_update = date('Y-m-d h:i:sa');
            $hdc_table->save();

            $sql = $hdc_table->sql;
            if ($sql <> '') {

                $kpi_list = KpiList::findOne(['id' =>$hdc_table->kpi_id ]);
                $datas = $connection->createCommand($sql)->queryAll();

                foreach ( $datas as  $data) {


                    if ($kpi_list->kpi_level == "ประเทศ" || $kpi_list->kpi_level == "สป." || $kpi_list->kpi_level == "กรม") {
                        $model = KpiSumMoph::findOne(['hospcode' => $data['hospcode'], 'kpi_year' => $data['kpi_year'], 'kpi_no' => $data['kpi_no']]);
                    } elseif ($kpi_list->kpi_level == "เขต") {
                        $model = KpiSumRegion::findOne(['hospcode' => $data['hospcode'], 'kpi_year' => $data['kpi_year'], 'kpi_no' => $data['kpi_no']]);
                    } else {
                        $model = KpiSum::findOne(['hospcode' => $data['hospcode'], 'kpi_year' => $data['kpi_year'], 'kpi_no' => $data['kpi_no']]);
                    }

                    if (!$model) {
                        if ($kpi_list->kpi_level == "ประเทศ" || $kpi_list->kpi_level == "สป." || $kpi_list->kpi_level == "กรม") {
                            $model = new KpiSumMoph();
                        } elseif ($kpi_list->kpi_level == "เขต") {
                            $model = new KpiSumRegion();
                        } else {
                            $model = new KpiSum();
                        }

                        $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
                        $model->content_date = date('Y-m-d h:i:sa');

                    }
                    $model->attributes=$data;
                    $model->save();
                }
            }


            $this->redirect(['hdc-s-table/index']);
        } else {
            $hdc_table = HdcSTable::findOne(['table_name' => $table_name]);
            $hdc_table->status = 'Failed';
            $hdc_table->last_update = date('Y-m-d h:i:sa');
            $hdc_table->save();
            $this->redirect(['hdc-s-table/index']);
        }
    }


    public function actionTest($table_name)
{
    $hdc_table = HdcSTable::findOne(['table_name' => $table_name]);

    $sql = $hdc_table->sql;
    $connection = Yii::$app->db_kpi;
    $datas = $connection->createCommand($sql)->queryAll();

    foreach ( $datas as  $data) {
        $model = KpiSum::findOne(['hospcode' => $data['hospcode']]);

        if (!$model) {
            $model = new KpiSum();
        }

        $model->attributes=$data;
        $model->save();
    }

    $this->redirect(['hdc-s-table/index']);
}



    /**
     * Displays a single HdcSTable model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HdcSTable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HdcSTable();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HdcSTable model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HdcSTable model.
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
     * Finds the HdcSTable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HdcSTable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HdcSTable::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
