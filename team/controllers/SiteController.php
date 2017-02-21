<?php
namespace team\controllers;

use common\models\User;
use Yii;
use common\models\LoginForm;
use common\models\Event;
use common\models\PasswordResetRequestForm;
use common\models\ResetPasswordForm;
use common\models\SignupForm;
use team\models\ContactForm;
use yii\base\InvalidParamException;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\ContentSearch;
use yii\data\Pagination;
use app\models\Content;

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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $query = $searchModel->searchQuery(Yii::$app->request->getQueryParams());

//        $cat_id = Yii::$app->request->getQueryParams(['cat_id']);
//        empty($cat_id) ? null : $query = ContentSearch::find()->where(['cat_id' => $cat_id]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(4);
        $models = $query->andWhere('`cat_id` in (2,3,4,5,21)')
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['content_date'=> SORT_DESC])
            ->all();

        $models_promote = Content::find()->Where('`cat_id` = 17')
            ->limit(4)
            ->orderBy(['content_date'=> SORT_DESC])
            ->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'models' => $models,
            'pages' => $pages,
            'models_promote'=> $models_promote,

        ]);

    }


    public function actionCalendarCeo()
    {
        return $this->render('calendar_ceo');
    }

    public function actionService()
    {
        return $this->render('service');
    }

    public function actionServiceDent()
    {
        return $this->render('service_dent');
    }

    public function actionFaq()
    {
        return $this->render('faq');
    }

    public function actionBoard()
    {
        return $this->render('board');
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionNews()
    {
        return $this->render('news');
    }

    public function actionGovservice()
    {
        return $this->render('govservice');
    }

    public function actionRegisService()
    {
        return $this->render('regis_service');
    }

    public function actionNomargin()
    {

        return $this->render('nomargin');

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            //$this->layout = '/login_layout';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionJsoncalendar($start = NULL, $end = NULL, $_ = NULL)
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $times = Event::find()->all();

        $events = array();

        foreach ($times AS $time) {
            //Testing
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $time->id;
            $Event->title = $time->title;
            $Event->start = date('Y-m-d\TH:i:s\Z', strtotime($time->start));
            $Event->end = date('Y-m-d\TH:i:s\Z', strtotime($time->end));
            $events[] = $Event;
        }

        return $events;
    }


    public function actionCalendar()
    {
        return $this->render('calendar');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
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

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                \Yii::$app->session->setFlash('success', 'กรุณาตรวจสอบใน email ของคุณเพื่อยืนยันการลงทะเบียน: ' . $model->email);
                return $this->goHome();
            }
        }

        $this->layout = '/login_layout';
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }


    public function actionConfirm($id, $key)
    {
        $user = \common\models\User::find()->where([
            'id' => $id,
            'auth_key' => $key,
            'status' => User::STATUS_NEW,
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

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
