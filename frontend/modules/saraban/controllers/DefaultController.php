<?php

namespace app\modules\saraban\controllers;

use Yii;
use yii\web\Controller;
use app\modules\saraban\models\Doc;
use app\modules\saraban\models\DocSearch;
use yii\web\NotFoundHttpException;

use yii\data\Pagination;
use app\modules\saraban\models\DocRecipient;
use yii\data\ActiveDataProvider;


class DefaultController extends Controller
{
    public function actionInbox()
    {
        return $this->render('index');
    }

    public function actionWaiting()
    {
        return $this->render('index');
    }

    public function actionDone()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        return $this->render('index');
    }

    /**
     * @return mixed
     */
    public function actionOutbox()
    {


        $searchModel = new DocSearch();
        $query = $searchModel->searchQuery(Yii::$app->request->getQueryParams());


        //$query = DocSearch::find()->where(['off_id' => '00017']);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(10);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('outbox', [
            'searchModel' => $searchModel,
            'models' => $models,
            'pages' => $pages,

        ]);
    }

    public function actionSearch()
    {
        return $this->render('index');
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


    public function actionInnerMsg($id)
    {
        $this->layout = '/blank';

        $query = DocRecipient::find();

        $query->andFilterWhere([
            'doc_id' => $id,
        ]);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>['attributes'=>['']],
        ]);

        $dataProvider->pagination->pageSize = 0;

        return $this->render('innermsg', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

}
