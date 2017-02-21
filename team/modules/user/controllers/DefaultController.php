<?php

namespace team\modules\user\controllers;

use backend\modules\employment\models\PaidEmployment;
use backend\modules\pay\models\Pay;
use common\models\Profile;
use common\models\User;
use team\modules\user\User as Module;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use team\modules\user\models\Asset;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\helpers\FileHelper;
use yii\imagine\Image;


/**
 * DefaultController implements the CRUD actions for User model.
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

    public function beforeAction($action)
    {

        $this->layout = '@app/themes/quirk/layouts/main'; //cabinet
        //$this->layout = '/cabinet';

        return parent::beforeAction($action);
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $paidEmployment = new ActiveDataProvider([
//            'query' => PaidEmployment::find()
//                ->select([
//                    '{{%paid_employment}}.timetable_id',
//                    '{{%paid_employment}}.date',
//                    '{{%timetable}}.start',
//                    '{{%timetable}}.end',
//                    '{{%group}}.name',
//                ])
//                ->joinWith(['timetable.group', 'pay'])
//                ->where(['{{%pay}}.user_id' => Yii::$app->user->id])
//                ->andWhere('concat(`date`," ",`end`) >= NOW()')
//                ->orderBy('`date`, `start`, `end`'),
//            'pagination' => [
//                'pageSize' => 30,
//            ],
//            'sort' => false,
//        ]);

        return $this->render('index', [
            //  'dataProvider' => $paidEmployment,
        ]);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionAsset()
    {
        return $this->render('asset', [
            //  'dataProvider' => $paidEmployment,
        ]);
    }

    public function actionAssetupload()
    {
        $model = new Asset();
        return $this->render('upload', [
              'model' => $model,
        ]);
    }

    /**
     * Lists all Asset models.
     * @return mixed
     */
    public function actionUpload($id)
    {
        $model = new Asset();
        $model->user_id = \Yii::$app->user->identity->id;

        if (Yii::$app->request->isPost) {
            $response = [];
            $model->file = UploadedFile::getInstance($model, 'image');

            if ($model->validate() && !empty($model->file)) {

                $upload_path = 'uploads/' . $model->user_id. '/';
                $thumbnail_path = 'uploads/' . $model->user_id. '/thumbnail/';
                $filename = $model->file->baseName . '.' . $model->file->extension;

                FileHelper::createDirectory($thumbnail_path);

                $model->file->saveAs($upload_path . $filename);
                Image::thumbnail($upload_path . $filename, 200, 200)->save($thumbnail_path . $filename, ['quality' => 80]);


                $model->name = $model->file->baseName . '.' . $model->file->extension;
                $model->type = $model->file->type;
                $model->size = $model->file->size;
                //$model->image = $model->file->type;
                //$model->type = $model->file->type;

                    Yii::$app->response->getHeaders()->set('Vary', 'Accept');
                Yii::$app->response->format = Response::FORMAT_JSON;
                $response = [];
                if ($model->save(false)) { // THIS IS THE RESPONSE UPLOADER REQUIRES!
                    $response['files'][] = [
                        'name' => $model->file->name,
                        'type' => $model->file->type,
                        'size' => $model->file->size,
                        'url' => Url::to('@web/'.$upload_path . $filename),
                        'thumbnailUrl' => Url::to('@web/'.$thumbnail_path . $filename),//$model->getImageUrl(TourPicture::SMALL_IMAGE),
                        'deleteUrl' => Url::to(['delete', 'id' => $model->id]), 'deleteType' => 'POST'];
                } else {
                    $response[] = ['error' => Yii::t('app', 'Unable to save picture')];
                }
                @unlink($model->file->tempName);

            } else {
                if ($model->hasErrors(['picture'])) {
                    $response[] = ['error' => HtmlHelper::errors($model)];
                } else {
                    throw new HttpException(500, Yii::t('app', 'Could not upload file.'));
                }
            }

            return $response;
        }

        return $this->render('upload', ['model' => $model]);
    }




    /**
     * Displays a single User model.
     * @return mixed
     */
    public
    function actionView()
    {
        //$isActiveAffiliateProgram = Pay::isActiveAffiliateProgram();

        return $this->render('view', [
            'model' => $this->findModel(\Yii::$app->user->id),
            //'isActiveAffiliateProgram' => $isActiveAffiliateProgram,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Displays a single User model.
     * @return mixed
     */
    public
    function actionHistory()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Pay::find()->where(['user_id' => Yii::$app->user->id])
                ->orderBy(['create_at' => SORT_DESC])
            ,
            'sort' => false,
            'pagination' => [
                'pageSize' => 30,
            ],
        ]);

        return $this->render('history', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @return mixed
     */
    public
    function actionViewPay($id)
    {
        $paidEmployment = new ActiveDataProvider([
            'query' => PaidEmployment::find()
                ->select([
                    '{{%paid_employment}}.timetable_id',
                    '{{%paid_employment}}.date',
                    '{{%timetable}}.start',
                    '{{%timetable}}.end',
                    '{{%group}}.name',
                ])
                ->joinWith('timetable.group')
                ->where(['pay_id' => $id])
                ->orderBy('date'),
            'pagination' => [
                'pageSize' => 30,
            ],
            'sort' => false,
        ]);

        $model = Pay::find()->where('id = :id AND user_id=' . Yii::$app->user->id, [':id' => $id])->one();

        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view_pay', [
            'model' => $model,
            'paidEmployment' => $paidEmployment,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public
    function actionUpdate()
    {
        $profile = Profile::findOne(['user_id' => Yii::$app->user->id]);
        $profile->setScenario('team-update-own');

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($profile);
        }

        if ($profile->load(Yii::$app->request->post()) && $profile->save()) {
            Yii::$app->session->setFlash('success', 'Data successfully changed');

            return $this->refresh();
        }

        return $this->render('update', ['profile' => $profile]);
    }

}
