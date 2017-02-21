<?php
namespace app\modules\hrm\controllers;


class WorkgroupController extends \yii\web\Controller {
    public function actionIndex()
    {
        return $this->render('index');
    }
}