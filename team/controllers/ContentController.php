<?php

namespace team\controllers;

use Yii;
use app\models\Content;
use app\models\ContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Uploads;
use yii\helpers\Url;
use yii\helpers\html;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use Imagine\Image\ManipulatorInterface;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
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

    public function actionCat()
    {
        return $this->render('cat');
    }

    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new ContentSearch();
        $query = $searchModel->searchQuery(Yii::$app->request->getQueryParams());

//        $cat_id = Yii::$app->request->getQueryParams(['cat_id']);
//
//
//        is_null($cat_id) ? $query = Content::find()->all() : $query = $query = Content::find()->where(['cat_id' => $cat_id]);
        //$query = ContentSearch::find()->where(['off_id' => '00017']);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(5);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['content_date'=> SORT_DESC])
            ->all();

        $models_pop = Content::find()->limit(5)->orderBy(['hits'=> SORT_DESC])->all();
        //where('content_date > DATE(NOW()) - INTERVAL 2 MONTH')->
        $models_recent = Content::find()->limit(5)->orderBy(['content_date'=> SORT_DESC])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'models' => $models,
            'models_pop' => $models_pop,
            'models_recent' => $models_recent,
            'pages' => $pages,

        ]);


    }


    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndexLaw()
    {

        $searchModel = new ContentSearch();
        $query = $searchModel->searchQuery(Yii::$app->request->getQueryParams());


        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(20);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['content_date'=> SORT_DESC])
            ->all();

        $models_pop = Content::find()->limit(5)->orderBy(['hits'=> SORT_DESC])->all();
        //where('content_date > DATE(NOW()) - INTERVAL 2 MONTH')->
        $models_recent = Content::find()->limit(5)->orderBy(['content_date'=> SORT_DESC])->all();

        return $this->render('index_law', [
            'searchModel' => $searchModel,
            'models' => $models,
            'models_pop' => $models_pop,
            'models_recent' => $models_recent,
            'pages' => $pages,

        ]);


    }

    /**
     * Displays a single Content model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new ContentSearch();
        //where('content_date > DATE(NOW()) - INTERVAL 2 MONTH')->
        $models_pop = Content::find()->limit(5)->orderBy(['hits'=> SORT_DESC])->all();
        $models_recent = Content::find()->limit(5)->orderBy(['content_date'=> SORT_DESC])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'models_pop' => $models_pop,
            'models_recent' => $models_recent,
        ]);
    }

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Content();

        if ($model->load(Yii::$app->request->post()) ) {
            $create_date = date('Y-m-d h:i:sa');
            $model->date_create = $create_date;
            $this->CreateDir(date('Y-m', strtotime($create_date)).'/'.$model->ref);
            $model->content_file = $this->uploadMultipleFile($model, 'content_file');
            $model->attach_files = $this->uploadMultipleFile($model, 'attach_files');


            is_null($model->content_date) ? $model->content_date = $model->date_create : date('Y-m-d h:i:sa');

            if($model->save()){

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
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $tempContent = $model->content_file;
        $tempAttach     = $model->attach_files;
        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir(date('Y-m', strtotime($model->date_create)).'/'.$model->ref);
            $model->content_file = $this->uploadMultipleFile($model,'content_file',$tempContent);
            $model->attach_files = $this->uploadMultipleFile($model,'attach_files',$tempAttach);

            is_null($model->content_date) ? $model->content_date = $model->date_create : date('Y-m-d h:i:sa');

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing Content model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        //remove upload file & data

        $this->removeUploadDir(date('Y-m', strtotime($model->date_create)).'/'.$model->ref);
        //Uploads::deleteAll(['ref'=>$model->ref]);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionDeletefile($id,$field,$fileName){
        $status = ['success'=>false];
        if(in_array($field, ['attach_files','content_file'])){
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
                $filePath = Content::getUploadPath().$ref.'/'.$fileName;
                @unlink($filePath);
                $filePath = Content::getUploadPath().$ref.'/thumbnail/'.$fileName;
                @unlink($filePath);
                $filePath = Content::getUploadPath().$ref.'/thumbnail_150_150/'.$fileName;
                @unlink($filePath);

            } else {
                $filePath = Content::getUploadPath().$ref.'/thumbnail/'.$fileName;
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
        if(!empty($model->ref) && !empty($model->content_file)){
            Yii::$app->response->sendFile($model->getUploadPath().date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/'.$file,$file_name);
        }else{
            $this->redirect(['/content/view','id'=>$id]);
        }
    }


    public function actionGetThumbnail($id,$file,$file_name){
        $model = $this->findModel($id);
        if(!empty($model->ref) && !empty($model->content_file)){
            Yii::$app->response->sendFile($model->getUploadPath().date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/thumbnail/'.$file,$file_name);
        }else{
            $this->redirect(['/content/view','id'=>$id]);
        }
    }

//    /**
//     * Upload & Rename file
//     * @return mixed
//     */
//    private function uploadSingleFile($model,$tempFile=null){
//
//        $files = [];
//        $json = '';
//        $tempFile = Json::decode($tempFile);
//        $UploadedFiles = UploadedFile::getInstances($model,'content_file');
//        if($UploadedFiles!==null){
//            foreach ($UploadedFiles as $file) {
//                try {   $oldFileName = $file->basename.'.'.$file->extension;
//                    $newFileName = md5($file->basename.time()).'.'.$file->extension;
//                    $file->saveAs(Content::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/'.$newFileName);
//                    $files[$newFileName] = [$oldFileName, $file->size ];
//                } catch (Exception $e) {
//
//                }
//            }
//            $json = json::encode(ArrayHelper::merge($tempFile,$files));
//        }else{
//            $json = $tempFile;
//        }
//        return $json;
//    }

    private function uploadMultipleFile($model,$field_name, $tempFile=null){
        $files = [];
        $json = '';
        $tempFile = Json::decode($tempFile);
        $UploadedFiles = UploadedFile::getInstances($model,$field_name);
        if($UploadedFiles!==null){
            foreach ($UploadedFiles as $file) {
                try {   $oldFileName = $file->basename.'.'.$file->extension;
                    $newFileName = md5($file->basename.time()).'.'.$file->extension;
                    $file->saveAs(Content::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/'.$newFileName);
                    $files[$newFileName] = [$oldFileName, $file->size ];

                    if ($field_name == 'content_file') {

                        Image::thumbnail(Content::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/'.$newFileName, 512, 200)
                            ->save(Content::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/thumbnail/'.$newFileName, ['quality' => 70]);

                        Image::thumbnail(Content::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/'.$newFileName, 150, 150)
                            ->save(Content::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->date_create)).'/'.$model->ref.'/thumbnail_150_150/'.$newFileName, ['quality' => 70]);
                    }

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
            $basePath = Content::getUploadPath();
            if(BaseFileHelper::createDirectory($basePath.$folderName,0777)){
                BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail',0777);
                BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail_150_150',0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir){
        BaseFileHelper::removeDirectory(Content::getUploadPath().$dir);
    }

}
