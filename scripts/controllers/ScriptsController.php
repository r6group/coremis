<?php

namespace scripts\controllers;

use Yii;
use app\models\Scripts;
//use app\models\ScriptDetails;
use app\models\ScriptDetailsSearch;
use yii\filters\AccessControl;
use app\models\ScriptsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;

/**
 * ScriptsController implements the CRUD actions for Scripts model.
 */
class ScriptsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'index', 'view'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['myscripts', 'logout','update','create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }




    /**
     * Lists all Scripts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $totalCount = Yii::$app->db_healthscript->createCommand('SELECT COUNT(*) FROM scripts WHERE public=1')
            ->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT scripts.*, COUNT(script_details.id) AS จำนวนรายงาน FROM scripts LEFT JOIN script_details ON script_details.parent_id = scripts.id  WHERE scripts.public=1 GROUP BY scripts.id',
            //'params' => [':parent_id' => intval($id)],
            'totalCount' => intval($totalCount),
            'db' => Yii::$app->db_healthscript,
            'key' => 'id',
            //'sort' =>false, to remove the table header sorting
            'sort' => [
                'attributes' => [
                    'cerate_date' => [
                        'asc' => ['cerate_date' => SORT_ASC],
                        'desc' => ['cerate_date' => SORT_DESC],
                        'default' => SORT_ASC,
                        'label' => 'Create Date',
                    ],

                ],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'test' => Yii::$app->request->queryParams,
        ]);
    }


    public function actionMyscripts()
    {
        $totalCount = Yii::$app->db_healthscript->createCommand('SELECT COUNT(*) FROM scripts WHERE user_id=:user_id', [':user_id' => \Yii::$app->user->identity->id])
            ->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT scripts.*, COUNT(script_details.id) AS จำนวนรายงาน FROM scripts LEFT JOIN script_details ON script_details.parent_id = scripts.id WHERE scripts.user_id=:user_id GROUP BY scripts.id',
            'params' => [':user_id' => \Yii::$app->user->identity->id],
            'totalCount' => intval($totalCount),
            'db' => Yii::$app->db_healthscript,
            'key' => 'id',
            //'sort' =>false, to remove the table header sorting
            'sort' => [
                'attributes' => [
                    'cerate_date' => [
                        'asc' => ['cerate_date' => SORT_ASC],
                        'desc' => ['cerate_date' => SORT_DESC],
                        'default' => SORT_ASC,
                        'label' => 'Create Date',
                    ],

                ],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('myscripts', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'test' => Yii::$app->request->queryParams,
        ]);
    }


    /**
     * Displays a single Scripts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {


        $totalCount = Yii::$app->db_healthscript->createCommand('SELECT COUNT(*) FROM script_details WHERE parent_id=:parent_id', [':parent_id' => intval($id)])
            ->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => "SELECT *  FROM script_details WHERE parent_id=:parent_id",
            'params' => [':parent_id' => intval($id)],
            'totalCount' => intval($totalCount),
            'db' => Yii::$app->db_healthscript,
            'key' => 'id',
            //'sort' =>false, to remove the table header sorting
            'sort' => [
                'attributes' => [
                    'cerate_date' => [
                        'asc' => ['cerate_date' => SORT_ASC],
                        'desc' => ['cerate_date' => SORT_DESC],
                        'default' => SORT_ASC,
                        'label' => 'Create Date',
                    ],

                ],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'test' => Yii::$app->request->queryParams,
            'test2' => ['ScriptsSearch'=>['parent_id'=>$id], 'r'=>'script-details/index']

        ]);
    }

    /**
     * Creates a new Scripts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Scripts();
        $model->public = 1;
        $model->master_active = 1;
        $model->force_master_cron = 0;



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Scripts model.
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
     * Deletes an existing Scripts model.
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
     * Finds the Scripts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Scripts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Scripts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
