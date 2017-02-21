<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use app\modules\v1\models\Scripts;
//use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\CompositeAuth;
use common\models\User;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
//use filsh\yii2\oauth2server\filters\ErrorToExceptionFilter;
//use filsh\yii2\oauth2server\filters\auth\CompositeAuth;



class ScriptsController extends ActiveController
{

    public $modelClass = 'app\modules\v1\models\Scripts';

//    public function behaviors()
//    {
//        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => HttpBasicAuth::className(),
//            'auth' => function ($username, $password) {
//                // Return Identity object or null
//                return User::findOne([
//                    'username' => $username,
//                    'password' => $password
//                ]);
//            },
//        ];
//        return [
//            $behaviors,
//        ];
//    }


//    public function behaviors()
//    {
//        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
//                HttpBasicAuth::className(),
//                HttpBearerAuth::className(),
//                QueryParamAuth::className(),
//            ],
//        ];
//        return $behaviors;
//    }

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





//            200 => 'OK',
//            400 => 'Bad Request',
//            401 => 'Unauthorized',
//            402 => 'Payment Required',
//            403 => 'Forbidden',
//            404 => 'Not Found',
//            500 => 'Internal Server Error',
//            501 => 'Not Implemented',



    public function actionTest()
    {
        $testresult = ['name' => 'ทรงพล', 'lastname' => 'เพียเพ็งต้น', 'age' => 39];
        return $testresult;
    }

    public function actionInfo($sid)
    {
        $connection = Yii::$app->db_healthscript;
        $data = $connection->createCommand("SELECT * FROM scripts WHERE id='".$sid."'")->queryAll();


        if (sizeof($data) <= 0) {
            throw new NotFoundHttpException('ID: '.$sid.' Not Found');
        } else {
            $script_details = $connection->createCommand("SELECT * FROM script_details WHERE parent_id='".$sid."'")->queryAll();

            $script_list = [];
            for ($i = 0; $i < sizeof($script_details); $i++) {
                $date = date_create($script_details[$i]['last_update']);
                $script_list[] = ['id'=>$script_details[$i]['table_name'],'title'=>$script_details[$i]['title'], 'las_update'=>date_format($date , "YmdHis") ];
            }

            $data_array = ['title'=>$data[0]['title'], 'desc'=> $data[0]['description'], 'totalscript'=>sizeof($script_details),

            'scripts'=>

                $script_list

            ];
            return $data_array;
        }


    }

    public function actionScript($sid, $id)
    {
        $connection = Yii::$app->db_healthscript;
        $script_details = $connection->createCommand("SELECT * FROM script_details WHERE parent_id='".$sid."' AND table_name='".$id."'")->queryAll();

        if (sizeof($script_details) <= 0) {
            throw new NotFoundHttpException('ID: '.$id.' Not Found');
        } else {
            $date = date_create($script_details[0]['last_update']);

            $data_array = [
                'id'=>$script_details[0]['table_name'],
                'title'=> $script_details[0]['title'],
                'las_update'=>date_format($date , "YmdHis"),
                'sql'=> $script_details[0]['script'],
            ];


            return $data_array;
        }

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