<?php

namespace kpi\controllers;

use common\models\CHospital;
use common\models\CProvince;
use common\models\Profile;
use kpi\models\KpiDataPermission;
use kpi\models\KpiList;
use Yii;
use kpi\models\KpiSum;
use kpi\models\KpiSumMoph;
use kpi\models\KpiSumRegion;
use kpi\models\KpiSumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;

/**
 * KpiSumController implements the CRUD actions for KpiSum model.
 */
class KpiSumController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'create', 'update'],
                'rules' => [

                    [
                        'actions' => ['index', 'create', 'update'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin', 'kpi-admin-moph', 'kpi-admin-bps', 'kpi-editor', 'kpi-admin-region', 'kpi-admin-province', 'kpi-admin-district', 'kpi-admin-hospital', 'kpi-reporter'],
                    ],

                    // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all KpiSum models.
     * @return mixed
     */
    public function actionIndex($id)
    {
//        if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin-moph') || \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-region') || \Yii::$app->user->can('kpi-admin-province') || \Yii::$app->user->can('kpi-admin-district') || \Yii::$app->user->can('kpi-admin-hospital') || \Yii::$app->user->can('kpi-reporter')) {
//
//        }


        if (Yii::$app->config->get('KPI.DATA.LOCK') == '1' && !(\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin-moph') || \Yii::$app->user->can('kpi-admin'))) {
            return $this->render('data-lock', [
            ]);
        } else {

            //$kpi_id = $id;
            $kpi_list = KpiList::findOne(['id' => $id]);
            $user_id = \Yii::$app->user->identity->getId();
            $profile = Profile::findOne(['user_id' => $user_id]);



            if ($kpi_list->kpi_level == "ประเทศ" || $kpi_list->kpi_level == "สป." || $kpi_list->kpi_level == "กรม") {

                if (!(\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') ||  \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-moph') || \Yii::$app->user->can('kpi-admin-bps') ) && (is_null(KpiDataPermission::findOne(['kpi_id' => $id, 'user_id' => $user_id])))) {// || \Yii::$app->user->can('kpi-reporter')
                    return $this->render('access-denied', [
                    ]);
                }

                $searchModel = new KpiSumSearch();
                $dataProvider = $searchModel->searchMoph(Yii::$app->request->queryParams);
//                $dataProvider->query->andWhere(['hospcode' => $profile->off_id]);



            } elseif ($kpi_list->kpi_level == "เขต") {
                if (!(\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') ||  \Yii::$app->user->can('kpi-admin') || \Yii::$app->user->can('kpi-admin-region')) && (is_null(KpiDataPermission::findOne(['kpi_id' => $id, 'user_id' => $user_id])))) {// || \Yii::$app->user->can('kpi-reporter')
                    return $this->render('access-denied', [
                    ]);
                }

                $searchModel = new KpiSumSearch();
                $dataProvider = $searchModel->searchRegion(Yii::$app->request->queryParams);

                if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin')  || \Yii::$app->user->can('kpi-admin')) {

                } else {
                    $dataProvider->query->andWhere('kpi_provcode in (SELECT
			`changwatcode`
		FROM
			`workbase`.`c_province`
		WHERE
			zonecode = "'.CProvince::getZoneFromProvcode(CHospital::getProvCode($profile->off_id)).'")'

                    );
                }


            } else {

                $searchModel = new KpiSumSearch();
                $dataProvider = $searchModel->searchProvince(Yii::$app->request->queryParams);

                if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin')  || \Yii::$app->user->can('kpi-admin')) {

                }
                elseif (\Yii::$app->user->can('kpi-admin-province')) {
                    $dataProvider->query->andWhere(['kpi_provcode' => CHospital::getProvCode($profile->off_id) ]);
                } elseif (\Yii::$app->user->can('kpi-admin-district')) {
                    $dataProvider->query->andWhere('hospcode in (SELECT
h.hoscode
FROM
workbase.c_hospital h
WHERE
h.provcode = "'.CHospital::getProvCode($profile->off_id).'"
AND h.distcode = "'.CHospital::getProvCode($profile->off_id).'"
AND h.hostype in ("18", "3", "2"))'

                    );
                }
                elseif (KpiDataPermission::findOne(['kpi_id' => $id, 'user_id' => $user_id])) {
                    $dataProvider->query->andWhere(['hospcode' => $profile->off_id]);
                } else {
                    return $this->render('access-denied', [
                    ]);
                }

            }





            $connection = Yii::$app->db_kpi;
            $kpi = $connection->createCommand('
            SELECT *
            FROM kpi_list k
            WHERE k.id = "'.$id.'"

            ')->queryAll();






        // validate if there is a editable input saved via AJAX
        if (Yii::$app->request->post('hasEditable')) {
            // instantiate your book model for saving
            $id = Yii::$app->request->post('editableKey');

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // fetch the first entry in posted data (there should
            // only be one entry anyway in this array for an
            // editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation

            $post = [];
            if (isset($_POST['KpiSumRegion'])) {
                $posted = current($_POST['KpiSumRegion']);
                $post['KpiSumRegion'] = $posted;
                $model = KpiSumRegion::findOne($id);
            } elseif (isset($_POST['KpiSumMoph'])) {
                $posted = current($_POST['KpiSumMoph']);
                $post['KpiSumMoph'] = $posted;
                $model = KpiSumMoph::findOne($id);
            } else {
                $posted = current($_POST['KpiSum']);
                $post['KpiSum'] = $posted;
                $model = KpiSum::findOne($id);
            }






            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model
                $model->save();

                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';

                // specific use case where you need to validate a specific
                // editable column posted when you have more than one
                // EditableColumn in the grid view. We evaluate here a
                // check to see if buy_amount was posted for the Book model
                if (isset($posted['kpi_b_value'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_b_value, 2);
                }
                elseif (isset($posted['kpi_a_value'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_a_value, 2);
                }
                elseif (isset($posted['kpi_c_value'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_c_value_, 2);
                }
                elseif (isset($posted['kpi_d_value'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_d_value, 2);
                }
                elseif (isset($posted['kpi_e_value'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_e_value_, 2);
                }
                elseif (isset($posted['kpi_f_value'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_f_value, 2);
                }


                if (isset($posted['kpi_b_value_q1'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_b_value_q1, 2);
                }
                elseif (isset($posted['kpi_a_value_q1'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_a_value_q1, 2);
                }
                elseif (isset($posted['kpi_c_value_q1'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_c_value_q1, 2);
                }
                elseif (isset($posted['kpi_d_value_q1'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_d_value_q1, 2);
                }
                elseif (isset($posted['kpi_e_value_q1'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_e_value_q1, 2);
                }
                elseif (isset($posted['kpi_f_value_q1'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_f_value_q1, 2);
                }


                if (isset($posted['kpi_b_value_q2'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_b_value_q2, 2);
                }
                elseif (isset($posted['kpi_a_value_q2'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_a_value_q2, 2);
                }
                elseif (isset($posted['kpi_c_value_q2'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_c_value_q2, 2);
                }
                elseif (isset($posted['kpi_d_value_q2'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_d_value_q2, 2);
                }
                elseif (isset($posted['kpi_e_value_q2'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_e_value_q2, 2);
                }
                elseif (isset($posted['kpi_f_value_q2'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_f_value_q2, 2);
                }




                if (isset($posted['kpi_b_value_q3'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_b_value_q3, 2);
                }
                elseif (isset($posted['kpi_a_value_q3'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_a_value_q3, 2);
                }
                elseif (isset($posted['kpi_c_value_q3'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_c_value_q3, 2);
                }
                elseif (isset($posted['kpi_d_value_q3'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_d_value_q3, 2);
                }
                elseif (isset($posted['kpi_e_value_q3'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_e_value_q3, 2);
                }
                elseif (isset($posted['kpi_f_value_q3'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_f_value_q3, 2);
                }




                if (isset($posted['kpi_b_value_q4'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_b_value_q4, 2);
                }
                elseif (isset($posted['kpi_a_value_q4'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_a_value_q4, 2);
                }
                elseif (isset($posted['kpi_c_value_q4'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_c_value_q4, 2);
                }
                elseif (isset($posted['kpi_d_value_q4'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_d_value_q4, 2);
                }
                elseif (isset($posted['kpi_e_value_q4'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_e_value_q4, 2);
                }
                elseif (isset($posted['kpi_f_value_q4'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->kpi_f_value_q4, 2);
                }



                // similarly you can check if the name attribute was posted as well
                // if (isset($posted['name'])) {
                //   $output =  ''; // process as you need
                // }
                $out = Json::encode(['output'=>$output, 'kpi_result'=> Yii::$app->formatter->asDecimal($model->kpi_result, 2) ,'message'=>'']);
            }
            // return ajax json encoded response and exit
            echo $out;
            return;
        }



            $dataProvider->pagination->pageSize = 100;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
           // 'model' => $model,
            'kpi' => $kpi,
        ]);
        }
    }

    /**
     * Displays a single KpiSum model.
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
     * Creates a new KpiSum model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KpiSum();

        if ($model->load(Yii::$app->request->post())) {
            $create_date = date('Y-m-d h:i:sa');
            $model->content_date = $create_date;
            $this->CreateDir(date('Y-m', strtotime($create_date)).'/'.$model->ref);
            $model->content_file = $this->uploadMultipleFile($model, 'content_file');
            $model->attach_files = $this->uploadMultipleFile($model, 'attach_files');

            $model->qwin_q1 = $this->uploadMultipleFile($model, 'qwin_q1');
            $model->qwin_q2 = $this->uploadMultipleFile($model, 'qwin_q2');
            $model->qwin_q3 = $this->uploadMultipleFile($model, 'qwin_q3');
            $model->qwin_q4 = $this->uploadMultipleFile($model, 'qwin_q4');

            $model->rep_q1 = $this->uploadMultipleFile($model, 'rep_q1');
            $model->rep_q2 = $this->uploadMultipleFile($model, 'rep_q2');
            $model->rep_q3 = $this->uploadMultipleFile($model, 'rep_q3');
            $model->rep_q4 = $this->uploadMultipleFile($model, 'rep_q4');


            if($model->save()){

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KpiSum model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tempContent = $model->content_file;
        $tempAttach = $model->attach_files;

        $qwin_q1 = $model->qwin_q1;
        $qwin_q2 = $model->qwin_q2;
        $qwin_q3 = $model->qwin_q3;
        $qwin_q4 = $model->qwin_q4;

        $rep_q1 = $model->rep_q1;
        $rep_q2 = $model->rep_q2;
        $rep_q3 = $model->rep_q3;
        $rep_q4 = $model->rep_q4;

        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir(date('Y-m', strtotime($model->content_date)) . '/' . $model->ref);
            $model->content_file = $this->uploadMultipleFile($model, 'content_file', $tempContent);
            $model->attach_files = $this->uploadMultipleFile($model, 'attach_files', $tempAttach);

            $model->qwin_q1 = $this->uploadMultipleFile($model, 'qwin_q1', $qwin_q1);
            $model->qwin_q2 = $this->uploadMultipleFile($model, 'qwin_q2', $qwin_q2);
            $model->qwin_q3 = $this->uploadMultipleFile($model, 'qwin_q3', $qwin_q3);
            $model->qwin_q4 = $this->uploadMultipleFile($model, 'qwin_q4', $qwin_q4);

            $model->rep_q1 = $this->uploadMultipleFile($model, 'rep_q1', $rep_q1);
            $model->rep_q2 = $this->uploadMultipleFile($model, 'rep_q2', $rep_q2);
            $model->rep_q3 = $this->uploadMultipleFile($model, 'rep_q3', $rep_q3);
            $model->rep_q4 = $this->uploadMultipleFile($model, 'rep_q4', $rep_q4);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }


        } else {


            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KpiSum model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->removeUploadDir($model->id . '/' . $model->ref);
        $model->delete();
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the KpiSum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KpiSum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KpiSum::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }




    public function actionDeletefile($id,$field,$fileName){
        $status = ['success'=>false];
        if(in_array($field, ['attach_files','content_file','qwin_q1','qwin_q2','qwin_q3','qwin_q4','rep_q1','rep_q2','rep_q3','rep_q4'])){
            $model = $this->findModel($id);
            $files =  Json::decode($model->{$field});
            if(array_key_exists($fileName, $files)){
                if($this->deleteFile('file',$model->id.'/'.$model->ref,$fileName)){
                    $status = ['success'=>true];
                    unset($files[$fileName]);
                    $model->{$field} = Json::encode($files);
                    $model->save();
                }
            }
        }
        echo json_encode($status);
    }

    private function deleteFile($type='file',$ref,$fileName){
        if(in_array($type, ['file','thumbnail'])){
            if($type==='file'){
                $filePath = KpiSum::getUploadPath().$ref.'/'.$fileName;
                @unlink($filePath);
                $filePath = KpiSum::getUploadPath().$ref.'/thumbnail/'.$fileName;
                @unlink($filePath);
                $filePath = KpiSum::getUploadPath().$ref.'/thumbnail_150_150/'.$fileName;
                @unlink($filePath);

            } else {
                $filePath = KpiSum::getUploadPath().$ref.'/thumbnail/'.$fileName;
                @unlink($filePath);
            }

            return true;
        }
        else{
            return false;
        }
    }


    public function actionDownload($id,$file,$file_name){
        $model = $this->findModel($id);
        $ref_path = empty($model->ref) ? '' : $model->ref . '/';

//        if(!empty($model->content_file)){//!empty($model->ref) &&
            Yii::$app->response->sendFile($model->getUploadPath().date('Y-m', strtotime($model->content_date)).'/'.$ref_path.$file,$file_name);
//        }else{
//            $this->redirect(['/kpi-sum/view','id'=>$id]);
//        }
    }


    public function actionGetThumbnail($id,$file,$file_name){
        $model = $this->findModel($id);
        if(!empty($model->ref) && !empty($model->content_file)){
            Yii::$app->response->sendFile($model->getUploadPath().$model->id.'/'.$model->ref.'/thumbnail/'.$file,$file_name);
        }else{
            $this->redirect(['/kpi-sum/view','id'=>$id]);
        }
    }



    private function uploadMultipleFile($model,$field_name, $tempFile=null){
        $files = [];
        $json = '';
        $tempFile = Json::decode($tempFile);
        $UploadedFiles = UploadedFile::getInstances($model,$field_name);
        if($UploadedFiles!==null){
            foreach ($UploadedFiles as $file) {
//                try {
                $oldFileName = $file->basename.'.'.$file->extension;
                $newFileName = md5($file->basename.time()).'.'.$file->extension;
                $file->saveAs(KpiSum::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/'.$newFileName);
                $files[$newFileName] = [$oldFileName, $file->size ];

                if ($field_name == 'content_file') {

                    Image::thumbnail(KpiSum::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/'.$newFileName, 512, 200)
                        ->save(KpiSum::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/thumbnail/'.$newFileName, ['quality' => 70]);

                    Image::thumbnail(KpiSum::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/'.$newFileName, 150, 150)
                        ->save(KpiSum::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/thumbnail_150_150/'.$newFileName, ['quality' => 70]);
                }

//                } catch (Exception $e) {
//
//                }
            }
            $json = json::encode(ArrayHelper::merge($tempFile,$files));
        }else{
            $json = $tempFile;
        }
        return $json;
    }



    private function CreateDir($folderName){
        if($folderName != NULL){
            $basePath = KpiSum::getUploadPath();
            if(BaseFileHelper::createDirectory($basePath.$folderName,0777)){
                BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail',0777);
                BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail_150_150',0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir){
        BaseFileHelper::removeDirectory(KpiSum::getUploadPath().$dir);
    }
}
