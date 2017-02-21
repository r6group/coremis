<?php

namespace app\modules\saraban\controllers;

use Yii;
use app\modules\saraban\models\Doc;
use app\modules\saraban\models\DocSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\saraban\models\Uploads;
use yii\helpers\Url;
use yii\helpers\html;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use app\modules\saraban\models\DocRecipient;

/**
 * DocController implements the CRUD actions for Doc model.
 */
class DocController extends Controller
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
     * Lists all Doc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Doc model.
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
     * Creates a new Doc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doc();

        if ($model->load(Yii::$app->request->post()) ) {
            $create_date = date('Y-m-d h:i:sa');
            $model->date_create = $create_date;
            $this->CreateDir(date('Y-m', strtotime($create_date)).'/'.$model->ref);
            $model->doc_file = $this->uploadSingleFile($model);
            $model->attach_files = $this->uploadMultipleFile($model);


            if($model->save()){

                $arr = array();
                $d = explode(',', $model->to);
                foreach ($d as $value){
                    $RecipientModel = new DocRecipient();
                    $RecipientModel->doc_id = $model->id;
                    $RecipientModel->from = $model->from;
                    $RecipientModel->to = $value;
                    $RecipientModel->status = "รอลงรับ";
                    $RecipientModel->save();
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Doc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $tempDoc = $model->doc_file;
        $tempAttach     = $model->attach_files;
        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir(date('Y-m', strtotime($model->date_create)).'/'.$model->ref);
            $model->doc_file = $this->uploadSingleFile($model,$tempDoc);
            $model->attach_files = $this->uploadMultipleFile($model,$tempAttach);

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing Doc model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        //remove upload file & data
        $this->removeUploadDir($model->ref);
        Uploads::deleteAll(['ref'=>$model->ref]);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Doc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Doc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doc::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionDeletefile($id,$field,$fileName){
        $status = ['success'=>false];
        if(in_array($field, ['attach_files','doc_file'])){
            $model = $this->findModel($id);
            $files =  Json::decode($model->{$field});
            if(array_key_exists($fileName, $files)){
                if($this->deleteFile('file',date('Y-m', strtotime($model->date_create)).'/'.$model->ref,$fileName)){
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
                $filePath = Doc::getUploadPath().$ref.'/'.$fileName;
            } else {
                $filePath = Doc::getUploadPath().$ref.'/thumbnail/'.$fileName;
            }
            @unlink($filePath);
            return true;
        }
        else{
            return false;
        }
    }

    public function actionDownload($id,$file,$file_name){
        $model = $this->findModel($id);
        if(!empty($model->ref) && !empty($model->doc_file)){
            Yii::$app->response->sendFile($model->getUploadPath().date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/'.$file,$file_name);
        }else{
            $this->redirect(['/Doc/view','id'=>$id]);
        }
    }

    /**
     * Upload & Rename file
     * @return mixed
     */
    private function uploadSingleFile($model,$tempFile=null){
        $file = [];
        $json = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model,'doc_file');
            if($UploadedFile !== null){
                $oldFileName = $UploadedFile->basename.'.'.$UploadedFile->extension;
                $newFileName = md5($UploadedFile->basename.time()).'.'.$UploadedFile->extension;



                $UploadedFile->saveAs(Doc::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/'.$newFileName);
                $file[$newFileName] = [$oldFileName,$UploadedFile->size];
                $json = Json::encode($file);
            }else{
                $json=$tempFile;
            }
        } catch (Exception $e) {
            $json=$tempFile;
        }
        return $json ;
    }

    private function uploadMultipleFile($model,$tempFile=null){
        $files = [];
        $json = '';
        $tempFile = Json::decode($tempFile);
        $UploadedFiles = UploadedFile::getInstances($model,'attach_files');
        if($UploadedFiles!==null){
            foreach ($UploadedFiles as $file) {
                try {   $oldFileName = $file->basename.'.'.$file->extension;
                    $newFileName = md5($file->basename.time()).'.'.$file->extension;
                    $file->saveAs(Doc::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/'.$newFileName);
                    $files[$newFileName] = [$oldFileName, $file->size ];
                } catch (Exception $e) {

                }
            }
            $json = json::encode(ArrayHelper::merge($tempFile,$files));
        }else{
            $json = $tempFile;
        }
        return $json;
    }



    private function CreateDir($folderName){
        if($folderName != NULL){
            $basePath = Doc::getUploadPath();
            if(BaseFileHelper::createDirectory($basePath.$folderName,0777)){
                BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail',0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir){
        BaseFileHelper::removeDirectory(Doc::getUploadPath().$dir);
    }

}
