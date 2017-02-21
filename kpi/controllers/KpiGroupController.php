<?php

namespace kpi\controllers;

use Yii;
use kpi\models\KpiGroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kpi\models\KpiList;
use kpi\models\KpiListSearch;

/**
 * KpiGroupController implements the CRUD actions for KpiGroup model.
 */
class KpiGroupController extends Controller
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



    public function beforeAction($event)
    {

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return parent::beforeAction($event);
    }


    /**
     * Lists all KpiGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => KpiGroup::find()->where(['user_id' => \Yii::$app->user->identity->getId()]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Lists all KpiGroup models.
     * @return mixed
     */
    public function actionPublicDashboard()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => KpiGroup::find()->where(['published' => '1']),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Lists all KpiGroup models.
     * @return mixed
     */
    public function actionDashboard($kpi_group)
    {
        return $this->redirect(['/kpi/index', 'id' => 1, 'kpi_group' => $kpi_group]);
    }

    /**
     * Displays a single KpiGroup model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new KpiListSearch();
        $dataProvider = $searchModel->kpigroup_search(Yii::$app->request->queryParams, $id);


        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new KpiGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KpiGroup();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->published = '1';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }





    /**
     * Updates an existing KpiGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (!\Yii::$app->user->identity || $model->user_id <> \Yii::$app->user->identity->getId()) {
            throw new NotFoundHttpException('คุณไม่ได้รับสิทธิ์ให้แก้ไข Dashboard นี้.');
        } else {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing KpiGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (!\Yii::$app->user->identity || $model->user_id <> \Yii::$app->user->identity->getId()) {
            throw new NotFoundHttpException('คุณไม่ได้รับสิทธิ์ให้แก้ไข Dashboard นี้.');
        } else {
            KpiList::deleteAll(['my_kpi_group' => $id]);
            $this->findModel($id)->delete();


            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the KpiGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KpiGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KpiGroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
