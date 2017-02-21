<?php

namespace devkm\controllers;

use Yii;
use app\models\KmItems;
use app\models\KmItemsSearch;
use app\models\Comments;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
use app\models\SignupForm;
use common\models\User;

/**
 * KmController implements the CRUD actions for KmItems model.
 */
class KmController extends Controller
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


    public function actionSignup()
    {



        $connection = Yii::$app->db;
        $data = $connection->createCommand("
            SELECT
FName,
LName,
UserName,
UserPwd,
Email
FROM
Stf
WHERE
ID BETWEEN 4001 AND 6000

")->queryAll();

        $users = [];
        for ($i = 0; $i < sizeof($data); $i++) {
            $user = new User();

            $user->f_name = $data[$i]['FName'];
            $user->l_name = $data[$i]['LName'];
            $user->username = $data[$i]['UserName'];
            $user->email = $data[$i]['Email'];


            $user->setPassword($data[$i]['UserPwd']);
            $user->generateAuthKey();
            if ($user->save()) {
                $users[] = '/'.$user->f_name. ' '.$user->l_name;
            } else {
                $users[] = 'x'.$user->f_name. ' '.$user->l_name;
            }


        }



        return $this->render('reg_result', [
            'users' => $users,
        ]);
    }

    /**
     * Lists all KmItems models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KmItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KmItems model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model_comments = new Comments();
        $model_comments->km_id = intval($id) ;



        $totalCount = Yii::$app->db_devkm->createCommand('SELECT COUNT(*) FROM comments WHERE km_id=:km_id', [':km_id' => intval($id)])
            ->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT * FROM comments WHERE km_id=:km_id',
            'params' => [':km_id' => intval($id)],
            'totalCount' => intval($totalCount),
            'db' => Yii::$app->db_devkm,
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


        if ($model_comments->load(Yii::$app->request->post()) && $model_comments->save()) {
            return $this->redirect(['view', 'id' => intval($id)]);
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
                'dataProvider' => $dataProvider,
                'model_comments' => $model_comments,
            ]);
        }

    }

    /**
     * Creates a new KmItems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KmItems();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KmItems model.
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
     * Deletes an existing KmItems model.
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
     * Finds the KmItems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KmItems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KmItems::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
