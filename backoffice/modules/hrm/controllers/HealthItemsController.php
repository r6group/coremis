<?php

namespace app\modules\hrm\controllers;

use Yii;
use app\modules\hrm\models\HealthItems;
use app\modules\hrm\models\HealthItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * HealthItemsController implements the CRUD actions for HealthItems model.
 */
class HealthItemsController extends Controller
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
     * Lists all HealthItems models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HealthItemsSearch;
        $connection = Yii::$app->db;
        $qryhrm = $connection->createCommand("SELECT
c_health_items.item_code,
c_health_items.item_name,
IFNULL(c.p11,0) AS 'สมุทรปราการ',
IFNULL(c.p20,0) AS 'ชลบุรี',
IFNULL(c.p21,0) AS 'ระยอง',
IFNULL(c.p22,0) AS 'จันทบุรี',
IFNULL(c.p23,0) AS 'ตราด',
IFNULL(c.p24,0) AS 'ฉะเชิงเทรา',
IFNULL(c.p25,0) AS 'ปราจีนบุรี',
IFNULL(c.p27,0) AS 'สระแก้ว',
IFNULL(c.total,0) AS 'รวม'
FROM c_health_items
LEFT JOIN (SELECT
item_code,
SUM(IF(c_hospital.provcode = '11',1,0 )) p11,
SUM(IF(c_hospital.provcode = '20',1,0 )) p20,
SUM(IF(c_hospital.provcode = '21',1,0 )) p21,
SUM(IF(c_hospital.provcode = '22',1,0 )) p22,
SUM(IF(c_hospital.provcode = '23',1,0 )) p23,
SUM(IF(c_hospital.provcode = '24',1,0 )) p24,
SUM(IF(c_hospital.provcode = '25',1,0 )) p25,
SUM(IF(c_hospital.provcode = '27',1,0 )) p27,
COUNT(health_items.id) total
FROM
health_items
JOIN c_hospital
ON health_items.off_id = c_hospital.hoscode
WHERE
c_hospital.provcode IN (11,20,21,22,23,24,25,27)
GROUP BY
health_items.item_code) c ON c_health_items.item_code = c.item_code;


")->queryAll();


        $dataProvider = new ArrayDataProvider([
            'allModels' => $qryhrm,
            'pagination' => [
                'pageSize' => 200,
            ],
            'sort' => ['attributes' => ['item_name', 'สมุทรปราการ', 'ชลบุรี', 'ระยอง',
                'จันทบุรี', 'ตราด', 'ฉะเชิงเทรา',
                'ปราจีนบุรี', 'สระแก้ว', 'รวม']
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'model' => $qryhrm
        ]);
    }

    /**
     * Lists all HealthItems models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new HealthItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HealthItems model.
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
     * Creates a new HealthItems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HealthItems();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HealthItems model.
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
     * Deletes an existing HealthItems model.
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
     * Finds the HealthItems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HealthItems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HealthItems::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
