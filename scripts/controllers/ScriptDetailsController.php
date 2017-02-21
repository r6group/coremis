<?php

namespace scripts\controllers;

use Yii;
use app\models\ScriptDetails;
use app\models\Scripts;
use app\models\ScriptDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ScriptDetailsController implements the CRUD actions for ScriptDetails model.
 */
class ScriptDetailsController extends Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['update', 'delete'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            $id = Yii::$app->getRequest()->getQueryParam('id');
                            //$this->findModel($id);

                            if(Yii::$app->user->isGuest){
                                return false;
                            } else {
                                $creator = $this->findModel($id)->getCreator()->select(['user_id'])->all();
                                $creator_id = $creator;
                                foreach ($creator as $user) {
                                    $creator_id = $user->user_id;
                                }

                                return  Yii::$app->user->identity->id == $creator_id;
                            }
                        }
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }



    /**
     * Lists all ScriptDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ScriptDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ScriptDetails model.
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
     * Creates a new ScriptDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ScriptDetails();

        $model->parent_id = Yii::$app->getRequest()->getQueryParam('parent_id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->active = true;
            $model->script =
            "#SQL_OPTIONS#
PROVIDERS=2
PROVIDER1=JHCIS
PROVIDER2=HOSXP
PROVIDER1_VALIDATE_TABLES=visitanc,visitancpregnancy,visit
PROVIDER2_VALIDATE_TABLES=person_anc_service,ovst,ovst_seq
SCRIPT_FLOW=SQL
#SQL_OPTIONS#

#PROVIDER1_SQL#


SET @provcode = :provcode;
SET @rep_year = :rep_year;
SET @hoscode = :hoscode;
SET @hosname = :hosname;
SET @hostype = :hostype;
SET @address = :address;
SET @subdistcode = :subdistcode;
SET @distcode = :distcode;
SET @level_service = :level_service;

/*SQL Script สำหรับ JHCIS เริ่มที่นี่ */
SELECT

FROM

WHERE
;
/*SQL Script สำหรับ JHCIS สิ้นสุดที่นี่ */


#PROVIDER1_SQL#


#PROVIDER2_SQL#
SET @provcode = :provcode;
SET @rep_year = :rep_year;
SET @hoscode = :hoscode;
SET @hosname = :hosname;
SET @hostype = :hostype;
SET @address = :address;
SET @subdistcode = :subdistcode;
SET @distcode = :distcode;
SET @level_service = :level_service;


/*SQL Script สำหรับ HosXP เริ่มที่นี่ */
SELECT

FROM

WHERE
;
/*SQL Script สำหรับ HosXP สิ้นสุดที่นี่ */

#PROVIDER2_SQL#";

            return $this->render('create', [
                'model' => $model,
                'parent_title'=>Yii::$app->getRequest()->getQueryParam('parent_title'),
            ]);
        }
    }

    /**
     * Updates an existing ScriptDetails model.
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
     * Deletes an existing ScriptDetails model.
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
     * Finds the ScriptDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ScriptDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ScriptDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
