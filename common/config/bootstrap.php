<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('api', dirname(dirname(__DIR__)) . '/api');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('team', dirname(dirname(__DIR__)) . '/team');
Yii::setAlias('phi', dirname(dirname(__DIR__)) . '/phi');
Yii::setAlias('backoffice', dirname(dirname(__DIR__)) . '/backoffice');
Yii::setAlias('kpi', dirname(dirname(__DIR__)) . '/kpi');
Yii::setAlias('dev', dirname(dirname(__DIR__)) . '/dev');

Yii::$container->set(\Zelenin\yii\modules\RequestLog\behaviors\RequestLogBehavior::className(), [
    'excludeRules' => [
        function () {
            list ($route, $params) = Yii::$app->getRequest()->resolve();
            return $route === 'debug/default/toolbar';
        }
    ]
]);