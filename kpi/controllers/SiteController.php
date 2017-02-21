<?php
namespace kpi\controllers;

use Yii;
use common\models\LoginForm;
use common\models\PasswordResetRequestForm;
use common\models\ResetPasswordForm;
use common\models\SignupForm;
use kpi\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionClearCache()
    {

        $r = Yii::$app->cache->flush();

        return $this->redirect(['index']);

    }

    public function actionIndex()
    {
        $this->redirect(\Yii::$app->urlManager->createUrl("kpi/index"));
//
//        $sql = "SELECT kpi_list.kpi_year,
//    kpi_sum.kpi_id,
//	kpi_list.kpi_level,
//	kpi_list.kpi_no,
//	kpi_list.title,
//	co_province.provname,
//	kpi_sum.update_by,
//	kpi_sum.last_update
//FROM kpi_sum INNER JOIN kpi_list ON kpi_sum.kpi_id = kpi_list.id
//	 INNER JOIN co_province ON kpi_sum.kpi_provcode = co_province.provid
//
//ORDER BY kpi_sum.last_update DESC
//LIMIT 10";
//
//        $connection = Yii::$app->db_kpi;
//        $kpi_update = $connection->createCommand($sql)->queryAll();
//
//
//        return $this->render('index', ['kpi_update'=>$kpi_update]);
    }

    public function actionIndex2()
    {


        $sql = "SELECT kpi_list.kpi_year,
    kpi_sum.kpi_id,
	kpi_list.kpi_level,
	kpi_list.kpi_no,
	kpi_list.title,
	co_province.provname,
	kpi_sum.update_by,
	kpi_sum.last_update
FROM kpi_sum INNER JOIN kpi_list ON kpi_sum.kpi_id = kpi_list.id
	 INNER JOIN co_province ON kpi_sum.kpi_provcode = co_province.provid

ORDER BY kpi_sum.last_update DESC
LIMIT 10";

        $connection = Yii::$app->db_kpi;
        $kpi_update = $connection->createCommand($sql)->queryAll();


        return $this->render('index_bak', ['kpi_update'=>$kpi_update]);
    }





    public function actionActivities()
    {


        $sql = "SELECT kpi_list.kpi_year,
    s.kpi_id,
	kpi_list.kpi_level,
	kpi_list.kpi_no,
	kpi_list.title,
	co_province.provname,
	s.update_by,
	s.last_update
FROM kpi_sum s INNER JOIN kpi_list ON s.kpi_id = kpi_list.id
	 INNER JOIN co_province ON s.kpi_provcode = co_province.provid
WHERE s.last_update IS NOT NULL

UNION
SELECT kpi_list.kpi_year,
    s.kpi_id,
	kpi_list.kpi_level,
	kpi_list.kpi_no,
	kpi_list.title,
	co_province.provname,
	s.update_by,
	s.last_update
FROM kpi_sum_moph s INNER JOIN kpi_list ON s.kpi_id = kpi_list.id
	 INNER JOIN co_province ON s.kpi_provcode = co_province.provid
WHERE s.last_update IS NOT NULL


UNION
SELECT kpi_list.kpi_year,
    s.kpi_id,
	kpi_list.kpi_level,
	kpi_list.kpi_no,
	kpi_list.title,
	co_province.provname,
	s.update_by,
	s.last_update
FROM kpi_sum_region s INNER JOIN kpi_list ON s.kpi_id = kpi_list.id
	 INNER JOIN co_province ON s.kpi_provcode = co_province.provid
WHERE s.last_update IS NOT NULL

ORDER BY last_update DESC
LIMIT 50";

        $connection = Yii::$app->db_kpi;
        $kpi_update = $connection->createCommand($sql)->queryAll();




        return $this->render('activities', [
            'kpi_update'=>$kpi_update,

        ]);
    }




    public function actionStatus()
    {

        $connection = Yii::$app->db_kpi;

        $connection->createCommand("SET SESSION group_concat_max_len = 1000000")->execute() ;// ->queryAll();

        $sql = "
SELECT
l.id,
l.kpi_year,
l.kpi_level,
l.kpi_no,
l.title,
IFNULL(COUNT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NOT NULL THEN CONCAT('(',s.kpi_provcode,')',co_province.provname) END),0) AS COMPLETE_COUNT,
GROUP_CONCAT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NOT NULL THEN CONCAT('(',s.kpi_provcode,')',co_province.provname) END ORDER BY kpi_provcode ASC SEPARATOR ', ') AS COMPLETE,
IFNULL(COUNT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NULL THEN CONCAT('(',s.kpi_provcode,')',co_province.provname) END),0) AS INCOMPLETE_COUNT,
GROUP_CONCAT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NULL THEN CONCAT('(',s.kpi_provcode,')',co_province.provname) END ORDER BY kpi_provcode ASC SEPARATOR ', ') AS INCOMPLETE
FROM
kpi_list l
LEFT JOIN kpi_sum s
ON l.id = s.kpi_id
LEFT JOIN co_province
ON s.kpi_provcode = co_province.provid
WHERE
l.kpi_year = '2560' AND
kpi_level = 'จังหวัด' AND
my_kpi <> '1' AND
(l.q1_goal <> '' OR l.q1_goal IS NOT NULL)
GROUP BY id
ORDER BY kpi_no;";


        $data = $connection->createCommand($sql)->queryAll();
        $page_size = 200;

        $totalRecord = sizeof($data);
        ($totalRecord > 0) ? $sort = ['attributes' => array_keys($data[0])] : $sort = [];
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'sort' => $sort,
            'pagination' => [
                'pageSize' => $page_size,
            ],
        ]);


        $sql = "
SELECT
l.id,
l.kpi_year,
l.kpi_level,
l.kpi_no,
l.title,
IFNULL(COUNT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NOT NULL THEN CONCAT('(',p.zoneid,') เขตฯ ',p.zoneid) END),0) AS COMPLETE_COUNT,
GROUP_CONCAT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NOT NULL THEN CONCAT('(',p.zoneid,') เขตฯ ',p.zoneid) END ORDER BY kpi_provcode ASC SEPARATOR ', ') AS COMPLETE,
IFNULL(COUNT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NULL THEN CONCAT('(',p.zoneid,') เขตฯ ',p.zoneid) END),0) AS INCOMPLETE_COUNT,
GROUP_CONCAT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NULL THEN CONCAT('(',p.zoneid,') เขตฯ ',p.zoneid) END ORDER BY kpi_provcode ASC SEPARATOR ', ') AS INCOMPLETE
FROM
kpi_list l
LEFT JOIN kpi_sum_region s
ON l.id = s.kpi_id
LEFT JOIN co_province p
ON s.kpi_provcode = p.provid
WHERE
l.kpi_year = '2560' AND
kpi_level = 'เขต' AND
(l.q1_goal <> '' OR l.q1_goal IS NOT NULL)
GROUP BY id
ORDER BY kpi_no;";


        $data_region = $connection->createCommand($sql)->queryAll();


        $totalRecord = sizeof($data_region);
        ($totalRecord > 0) ? $sort = ['attributes' => array_keys($data_region[0])] : $sort = [];
        $dataProviderRegion = new ArrayDataProvider([
            'allModels' => $data_region,
            'sort' => $sort,
            'pagination' => [
                'pageSize' => $page_size,
            ],
        ]);



        $sql = "
SELECT
l.id,
l.kpi_year,
l.kpi_level,
l.kpi_no,
l.title,
IFNULL(COUNT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NOT NULL THEN CONCAT('(',s.kpi_provcode,')',h.hosname) END),0) AS COMPLETE_COUNT,
GROUP_CONCAT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NOT NULL THEN CONCAT('(',s.kpi_provcode,')',h.hosname) END ORDER BY kpi_provcode ASC SEPARATOR ', ') AS COMPLETE,
IFNULL(COUNT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NULL THEN CONCAT('(',s.kpi_provcode,')',h.hosname) END),0) AS INCOMPLETE_COUNT,
GROUP_CONCAT(DISTINCT CASE WHEN s.kpi_a_value_q1 IS NULL THEN CONCAT('(',s.kpi_provcode,')',h.hosname) END ORDER BY kpi_provcode ASC SEPARATOR ', ') AS INCOMPLETE
FROM
kpi_list l
LEFT JOIN kpi_sum_moph s
ON l.id = s.kpi_id
LEFT JOIN workbase.c_hospital h
ON s.hospcode = h.hoscode
WHERE
l.kpi_year = '2560' AND
kpi_level IN ('ประเทศ', 'สป.', 'กรม') AND
(l.q1_goal <> '' OR l.q1_goal IS NOT NULL)
GROUP BY id
ORDER BY kpi_no;";


        $data_moph = $connection->createCommand($sql)->queryAll();


        $totalRecord = sizeof($data_region);
        ($totalRecord > 0) ? $sort = ['attributes' => array_keys($data_moph[0])] : $sort = [];
        $dataProviderMoph = new ArrayDataProvider([
            'allModels' => $data_moph,
            'sort' => $sort,
            'pagination' => [
                'pageSize' => $page_size,
            ],
        ]);





        return $this->render('status', [
                'dataProvider' => $dataProvider,
            'dataProviderRegion' => $dataProviderRegion,
            'dataProviderMoph' => $dataProviderMoph,

            ]);
    }


    public function actionProfile()
    {
        return $this->render('profile');
    }



    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

//    public function actionSignup()
//    {
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post())) {
//            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    return $this->goHome();
//                }
//            }
//        }
//
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
//    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                \Yii::$app->session->setFlash('success', 'กรุณาตรวจสอบใน email ของคุณเพื่อยืนยันการลงทะเบียน: ' . $model->email);
                return $this->goHome();
            }
        }

//        $this->layout = '/login_layout';
        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    public function actionConfirm($id, $key)
    {
        $user = \common\models\User::find()->where([
            'id' => $id,
            'auth_key' => $key,
            'status' => \common\models\User::STATUS_NEW,
        ])->one();
        if (!empty($user)) {
            $user->generateAuthKey();
            $user->changeUserStatusNewToActive(); //$user will be save in this step.

            Yii::$app->getSession()->setFlash('success', 'ยินดีต้อนรับ คุณ '.$user->FullName.', การลงทะเบียนได้รับการยืนยันแล้ว.');

            if (Yii::$app->user->login($user, 0)) {
                return $this->goHome();
            }

//            $model = new LoginForm();
//            $model->email = $user->email;
//
//            Yii::$app->user->logout();
//            return $this->render('login', [
//                'model' => $model,
//            ]);

        } else {
            Yii::$app->getSession()->setFlash('warning', 'Failed!');

        }
        return $this->goHome();
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'กรุณาตรวจสอบใน Email ของคุณ เพื่อดำเนินการในขั้นตอนต่อไป.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
