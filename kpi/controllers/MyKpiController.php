<?php

namespace kpi\controllers;

use Yii;
use kpi\models\KpiList;
use kpi\models\KpiListSearch;
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
 * KpiListController implements the CRUD actions for KpiList model.
 */
class MyKpiController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete'],
                    'rules' => [
                        // deny all POST requests
                        [
                            'actions' => ['delete'],
                            'allow' => true,
                            'verbs' => ['POST'],
                            'roles' => ['@'],
                        ],
                        // allow authenticated users
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'actions' => ['create', 'update'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        // everything else is denied
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
 * Lists all KpiList models.
 * @return mixed
 */
    public function actionIndex()
    {
        $searchModel = new KpiListSearch();
        $dataProvider = $searchModel->mykpi_search(Yii::$app->request->queryParams);

        return $this->render('/kpi-list/index-my', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all KpiList models.
     * @return mixed
     */
    public function actionSearch()
    {
        $searchModel = new KpiListSearch();
        $dataProvider = $searchModel->mykpi_search(Yii::$app->request->queryParams);

        return $this->render('/kpi-list/search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KpiList model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $child = KpiList::find()->where(['parent_id' => $id])->orderBy(['kpi_no' => SORT_ASC])->all();
        $child_html = '';
        foreach ($child as $model) {
            $child_html .= '<a href='.Url::toRoute(['/kpi-list/view', 'id'=>$model->id]).' class="">'.$model->kpi_no.' '.$model->title.'</a><br>';
        }


        return $this->render('/kpi-list/view', [
            'model' => $this->findModel($id),
            'child_html' => $child_html,
        ]);



    }

    /**
     * Creates a new KpiList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($parent_id =  0, $group_id)
    {
        $parent_title = '';
        if ($parent_id != 0) {
            $kpi_list = KpiList::findOne(['id' => $parent_id]);
            $parent_title = $kpi_list->title;
        }


        $model = new KpiList();

        if ($model->load(Yii::$app->request->post())) {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
            $create_date = date('Y-m-d h:i:sa');
            $model->content_date = $create_date;
            $this->CreateDir(date('Y-m', strtotime($create_date)).'/'.$model->ref);
            $model->content_file = $this->uploadMultipleFile($model, 'content_file');
            $model->attach_files = $this->uploadMultipleFile($model, 'attach_files');
            $model->my_kpi = 1;
            $model->my_kpi_group = $group_id;


            if($model->save()){
                return $this->redirect(['/kpi-group/view', 'id' => $group_id]);
            }

        } else {


        }

        return $this->render('/kpi-list/create', [
            'model' => $model,
            'parent_id' => $parent_id,
            'parent_title' => $parent_title,
        ]);

    }

    /**
     * Updates an existing KpiList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tempContent = $model->content_file;
        $tempAttach = $model->attach_files;

        if ($model->user_id <> \Yii::$app->user->identity->getId()) {
            throw new NotFoundHttpException('คุณไม่ได้รับสิทธิ์ให้แก้ไข Dashboard นี้.');

        } else {
            if ($model->load(Yii::$app->request->post())) {

                $this->CreateDir(date('Y-m', strtotime($model->content_date)) . '/' . $model->ref);
                $model->content_file = $this->uploadMultipleFile($model, 'content_file', $tempContent);
                $model->attach_files = $this->uploadMultipleFile($model, 'attach_files', $tempAttach);

//            is_null($model->content_date) ? $model->content_date = $model->date_create : date('Y-m-d h:i:sa');

                if ($model->save()) {
                    return $this->redirect(['/kpi-list/view', 'id' => $model->id]);
                }

                return $this->redirect(['/kpi-list/view', 'id' => $model->id]);
            } else {

                if (!$model->load(Yii::$app->request->post())) {
                    empty($model->hosp_visible) ? $model->hosp_visible = null : $model->hosp_visible = explode(',', $model->hosp_visible);
                }

                $parent_title = '';
                if ($model->parent_id != 0) {
                    $kpi_list = KpiList::findOne(['id' => $model->parent_id]);
                    $parent_title = $kpi_list->title;
                }


                return $this->render('/kpi-list/update', [
                    'model' => $model,
                    'parent_title' => $parent_title,
                ]);


                ///kpi-sum/index/
            }
        }




    }

    /**
     * Deletes an existing KpiList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->user_id <> \Yii::$app->user->identity->getId()) {
            throw new NotFoundHttpException('คุณไม่ได้รับสิทธิ์ให้แก้ไข Dashboard นี้.');
        } else {
            $this->removeUploadDir(date('Y-m', strtotime($model->content_date)) . '/' . $model->ref);
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the KpiList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KpiList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KpiList::findOne($id)) !== null) {
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
                if($this->deleteFile('file',date('Y-m', strtotime($model->content_date)).'/'.$model->ref,$fileName)){
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
                $filePath = KpiList::getUploadPath().$ref.'/'.$fileName;
                @unlink($filePath);
                $filePath = KpiList::getUploadPath().$ref.'/thumbnail/'.$fileName;
                @unlink($filePath);
                $filePath = KpiList::getUploadPath().$ref.'/thumbnail_150_150/'.$fileName;
                @unlink($filePath);

            } else {
                $filePath = KpiList::getUploadPath().$ref.'/thumbnail/'.$fileName;
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
            Yii::$app->response->sendFile($model->getUploadPath().date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/'.$file,$file_name);
        }else{
            $this->redirect(['/kpi-list/view','id'=>$id]);
        }
    }


    public function actionGetThumbnail($id,$file,$file_name){
        $model = $this->findModel($id);
        if(!empty($model->ref) && !empty($model->content_file)){
            Yii::$app->response->sendFile($model->getUploadPath().date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/thumbnail/'.$file,$file_name);
        }else{
            $this->redirect(['/kpi-list/view','id'=>$id]);
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
                $file->saveAs(KpiList::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/'.$newFileName);
                $files[$newFileName] = [$oldFileName, $file->size ];

                if ($field_name == 'content_file') {

                    Image::thumbnail(KpiList::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/'.$newFileName, 512, 200)
                        ->save(KpiList::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/thumbnail/'.$newFileName, ['quality' => 70]);

                    Image::thumbnail(KpiList::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/'.$newFileName, 150, 150)
                        ->save(KpiList::UPLOAD_FOLDER.'/'.date('Y-m', strtotime($model->content_date)).'/'.$model->ref.'/thumbnail_150_150/'.$newFileName, ['quality' => 70]);
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
            $basePath = KpiList::getUploadPath();
            if(BaseFileHelper::createDirectory($basePath.$folderName,0777)){
                BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail',0777);
                BaseFileHelper::createDirectory($basePath.$folderName.'/thumbnail_150_150',0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir){
        BaseFileHelper::removeDirectory(KpiList::getUploadPath().$dir);
    }
}
