<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
//use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\CompositeAuth;
use common\models\User;
use yii\helpers\ArrayHelper;
//use filsh\yii2\oauth2server\filters\ErrorToExceptionFilter;
//use filsh\yii2\oauth2server\filters\auth\CompositeAuth;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class InfoController extends ActiveController
{


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                HttpBasicAuth::className(),
                HttpBearerAuth::className(),
                QueryParamAuth::className(),
            ],
        ];
        return $behaviors;
    }

//    public function behaviors()
//    {
//        return ArrayHelper::merge(parent::behaviors(), [
//            'authenticator' => [
//                'class' => CompositeAuth::className(),
//                'authMethods' => [
//                    ['class' => HttpBearerAuth::className()],
//                    ['class' => QueryParamAuth::className(), 'tokenParam' => 'accessToken'],
//                ]
//            ],
//            'exceptionFilter' => [
//                'class' => ErrorToExceptionFilter::className()
//            ],
//        ]);
//    }

    //public $modelClass = 'app\modules\v1\models\Info';

    public $modelClass = 'common\models\User';

    public function actionTest()
    {
        $testresult = ['name' => 'ทรงพล', 'lastname' => 'เพียเพ็งต้น', 'age' => 39];
        return $testresult;
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionLogin($id, $password)
    {

        if (User::findByUsername($id)->validatePassword($password)) {
            return ['status' => 'Success', 'auth_key' => User::findByUsername($id)->auth_key];
        } else {
            return ['status' => 'Failed'];

        }

    }
}