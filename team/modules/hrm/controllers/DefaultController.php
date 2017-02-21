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
        //$model->setScenario('team-update-own');

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
