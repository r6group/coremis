<?php
namespace kpi\controllers;

use common\models\CProvince;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Profile;
use common\models\AuthAssignment;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use kpi\models\KpiCsvImport;
use common\models\Config;
use kpi\models\ConfigSearch;
use yii\web\HttpException;
use kpi\models\KpiListSearch;
use kpi\models\KpiDataPermission;


/**
 * Site controller
 */
class SettingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'profile', 'update', 'kpi-admin', 'kpi-editor', 'kpi-admin-moph', 'kpi-admin-region', 'kpi-admin-province', 'kpi-admin-district', 'kpi-admin-hospital', 'kpi-reporter', 'kpi-report'],
                'rules' => [
                    [
                        'actions' => ['profile', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin'],
                    ],
                    [
                        'actions' => ['kpi-admin'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin'],
                    ],
                    [
                        'actions' => ['kpi-admin-bps'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin'],
                    ],
                    [
                        'actions' => ['kpi-editor'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin'],
                    ],
                    [
                        'actions' => ['kpi-admin-moph'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin'],
                    ],
                    [
                        'actions' => ['kpi-admin-region'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin', 'kpi-editor'],
                    ],
                    [
                        'actions' => ['kpi-admin-province'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin', 'kpi-editor', 'kpi-admin-province'],
                    ],
                    [
                        'actions' => ['kpi-admin-district'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin', 'kpi-editor', 'kpi-admin-province', 'kpi-admin-district'],
                    ],
                    [
                        'actions' => ['kpi-admin-hospital'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin', 'kpi-editor', 'kpi-admin-province', 'kpi-admin-district', 'kpi-admin-hospital'],
                    ],
                    [
                        'actions' => ['kpi-reporter'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin-moph', 'kpi-admin',  'kpi-admin-bps', 'kpi-editor', 'kpi-admin-region', 'kpi-admin-province', 'kpi-admin-district', 'kpi-admin-hospital'],
                    ],
                    [
                        'actions' => ['kpi-report'],
                        'allow' => true,
                        'roles' => ['superadmin', 'kpi-system-admin', 'kpi-admin-moph', 'kpi-admin', 'kpi-editor', 'kpi-admin-region', 'kpi-admin-province', 'kpi-admin-district', 'kpi-admin-hospital', 'kpi-reporter'],
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

    public function actionRole()
    {
        $this->layout = '../../themes/kingadmin/layouts/main_setting';

        $connection = Yii::$app->db;
        $data = $connection->createCommand('
        SELECT
auth_assignment.item_name,
auth_item.`name`,
auth_item.description
FROM
auth_assignment
JOIN auth_item
ON auth_assignment.item_name = auth_item.`name`
WHERE
auth_assignment.user_id = ' . Yii::$app->user->getId() . '
            ')->queryAll();


        return $this->render('setting', [
            'data' => $data,
        ]);
    }






    public function actionKpiAdmin()
    {
        $user_id = '';
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];

            if (isset($_POST['remove'])) {
                AuthAssignment::deleteAll(['user_id' => $user_id, 'item_name' => 'kpi-admin']);
            } else {
                $NewAuth = new AuthAssignment();
                $NewAuth->item_name = 'kpi-admin';
                $NewAuth->user_id = $user_id;
                $NewAuth->save();
            }
        }

        $connection = Yii::$app->db;
        $data = $connection->createCommand('
select auth_assignment.*, profile.*  from `auth_assignment` inner join profile on profile.user_id = auth_assignment.user_id where `item_name` = "kpi-admin" order by profile.off_id, profile.name

            ')->queryAll();

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('kpi-admin', [
            'id' => $user_id,
            'data' => $data,
            'admin_title' => 'กำหนด Admin ระบบ KPI กระทรวงสาธารณสุข',
        ]);
    }


    public function actionKpiAdminBps()
    {
        $user_id = '';
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];

            if (isset($_POST['remove'])) {
                AuthAssignment::deleteAll(['user_id' => $user_id, 'item_name' => 'kpi-admin-bps']);
            } else {
                $NewAuth = new AuthAssignment();
                $NewAuth->item_name = 'kpi-admin-bps';
                $NewAuth->user_id = $user_id;
                $NewAuth->save();
            }
        }

        $connection = Yii::$app->db;
        $data = $connection->createCommand('
select auth_assignment.*, profile.*  from `auth_assignment` inner join profile on profile.user_id = auth_assignment.user_id where `item_name` = "kpi-admin-bps" order by profile.off_id, profile.name

            ')->queryAll();

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('kpi-admin', [
            'id' => $user_id,
            'data' => $data,
            'admin_title' => 'กำหนด Admin สนย.',
        ]);
    }



    public function actionKpiEditor()
    {
        $user_id = '';
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];

            if (isset($_POST['remove'])) {
                AuthAssignment::deleteAll(['user_id' => $user_id, 'item_name' => 'kpi-editor']);
            } else {
                $NewAuth = new AuthAssignment();
                $NewAuth->item_name = 'kpi-editor';
                $NewAuth->user_id = $user_id;
                $NewAuth->save();
            }
        }

        $connection = Yii::$app->db;
        $data = $connection->createCommand('
select auth_assignment.*, profile.*  from `auth_assignment` inner join profile on profile.user_id = auth_assignment.user_id where `item_name` = "kpi-editor" order by profile.off_id, profile.name

            ')->queryAll();

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('kpi-admin', [
            'id' => $user_id,
            'data' => $data,
            'admin_title' => 'กำหนดผู้ สร้าง/แก้ไข รายละเอียด KPI',
        ]);
    }


    public function actionKpiAdminMoph()
    {
        $user_id = '';
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];

            if (isset($_POST['remove'])) {
                AuthAssignment::deleteAll(['user_id' => $user_id, 'item_name' => 'kpi-admin-moph']);
            } else {
                $NewAuth = new AuthAssignment();
                $NewAuth->item_name = 'kpi-admin-moph';
                $NewAuth->user_id = $user_id;
                $NewAuth->save();
            }
        }

        $connection = Yii::$app->db;
        $data = $connection->createCommand('
select auth_assignment.*, profile.*  from `auth_assignment` inner join profile on profile.user_id = auth_assignment.user_id where `item_name` = "kpi-admin-moph" order by profile.off_id, profile.name

            ')->queryAll();

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('kpi-admin', [
            'id' => $user_id,
            'data' => $data,
            'admin_title' => 'กำหนด Admin กรม',
        ]);
    }


    public function actionKpiAdminRegion()
    {
        $user_id = '';
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];

            if (isset($_POST['remove'])) {
                AuthAssignment::deleteAll(['user_id' => $user_id, 'item_name' => 'kpi-admin-region']);
            } else {
                $NewAuth = new AuthAssignment();
                $NewAuth->item_name = 'kpi-admin-region';
                $NewAuth->user_id = $user_id;
                $NewAuth->save();
            }
        }

        $connection = Yii::$app->db;
        $data = $connection->createCommand('
select auth_assignment.*, profile.*  from `auth_assignment` inner join profile on profile.user_id = auth_assignment.user_id where `item_name` = "kpi-admin-region" order by profile.off_id, profile.name

            ')->queryAll();

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('kpi-admin', [
            'id' => $user_id,
            'data' => $data,
            'admin_title' => 'กำหนด Admin เขตสุขภาพ',
        ]);
    }


    public function actionKpiAdminProvince()
    {
        $user_id = '';
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];

            if (isset($_POST['remove'])) {
                AuthAssignment::deleteAll(['user_id' => $user_id, 'item_name' => 'kpi-admin-province']);
            } else {
                $NewAuth = new AuthAssignment();
                $NewAuth->item_name = 'kpi-admin-province';
                $NewAuth->user_id = $user_id;
                $NewAuth->save();
            }
        }

        $connection = Yii::$app->db;
        $data = $connection->createCommand('
select auth_assignment.*, profile.*  from `auth_assignment` inner join profile on profile.user_id = auth_assignment.user_id where `item_name` = "kpi-admin-province" order by profile.off_id, profile.name

            ')->queryAll();

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('kpi-admin', [
            'id' => $user_id,
            'data' => $data,
            'admin_title' => 'กำหนด Admin จังหวัด',
        ]);
    }


    public function actionKpiAdminDistrict()
    {
        $user_id = '';
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];

            if (isset($_POST['remove'])) {
                AuthAssignment::deleteAll(['user_id' => $user_id, 'item_name' => 'kpi-admin-district']);
            } else {
                $NewAuth = new AuthAssignment();
                $NewAuth->item_name = 'kpi-admin-district';
                $NewAuth->user_id = $user_id;
                $NewAuth->save();
            }
        }


        $cond = '';
        if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
            //
        } else {
            $cond = 'and c_hospital.provcode = ' . Profile::getOffProvcode(\yii::$app->user->identity->getId()) . '';
        }


        $connection = Yii::$app->db;
        $data = $connection->createCommand('

SELECT
auth_assignment.*,
`profile`.*,
c_hospital.hoscode,
c_hospital.distcode,
c_hospital.provcode
FROM
`profile`
JOIN auth_assignment
ON `profile`.user_id = auth_assignment.user_id
JOIN c_hospital
ON `profile`.off_id = c_hospital.hoscode
WHERE
`item_name` = "kpi-admin-district"
' . $cond . '
ORDER BY
`profile`.off_id ASC,
`profile`.`name` ASC

            ')->queryAll();

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('kpi-admin', [
            'id' => $user_id,
            'data' => $data,
            'admin_title' => 'กำหนด Admin สสอ.',
        ]);
    }


    public function actionKpiAdminHospital()
    {
        $user_id = '';
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];

            if (isset($_POST['remove'])) {
                AuthAssignment::deleteAll(['user_id' => $user_id, 'item_name' => 'kpi-admin-hospital']);
            } else {
                $NewAuth = new AuthAssignment();
                $NewAuth->item_name = 'kpi-admin-hospital';
                $NewAuth->user_id = $user_id;
                $NewAuth->save();
            }
        }


        $cond = '';
        if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
            //
        } else {
            $cond = 'and c_hospital.provcode = ' . Profile::getOffProvcode(\yii::$app->user->identity->getId()) . '';
        }


        $connection = Yii::$app->db;
        $data = $connection->createCommand('

SELECT
auth_assignment.*,
`profile`.*,
c_hospital.hoscode,
c_hospital.distcode,
c_hospital.provcode
FROM
`profile`
JOIN auth_assignment
ON `profile`.user_id = auth_assignment.user_id
JOIN c_hospital
ON `profile`.off_id = c_hospital.hoscode
WHERE
`item_name` = "kpi-admin-hospital"
' . $cond . '
ORDER BY
`profile`.off_id ASC,
`profile`.`name` ASC

            ')->queryAll();


        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('kpi-admin', [
            'id' => $user_id,
            'data' => $data,
            'admin_title' => 'กำหนด Admin รพ.',
        ]);
    }


    public function actionKpiReporter()
    {

        $searchModel = new KpiListSearch();
        $locate = [];


        if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {

            $locate = ['เขต', 'ประเทศ', 'สป.','กรม', 'จังหวัด'];
        } else {

            if ( \Yii::$app->user->can('kpi-admin-moph') || \Yii::$app->user->can('kpi-admin-bps')) {
                array_push($locate, 'ประเทศ');
                array_push($locate, 'สป.');
                array_push($locate, 'กรม');
            }
            if ( \Yii::$app->user->can('kpi-admin-region')) {
                array_push($locate, 'เขต');
            }
            if ( \Yii::$app->user->can('kpi-admin-province')) {
                array_push($locate, 'จังหวัด');
            }
            if ( \Yii::$app->user->can('kpi-admin-district') || \Yii::$app->user->can('kpi-admin-hospital')) {
                array_push($locate, 'จังหวัด');
            }
        }


        if ( \Yii::$app->user->can('kpi-admin-district') || \Yii::$app->user->can('kpi-admin-hospital')) {
            array_push($locate, 'จังหวัด');
            $dataProvider = $searchModel->searchAssign($locate, 1);
        } else {
            $dataProvider = $searchModel->searchAssign($locate, 0);
        }



        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('kpi_list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);


    }


    public function actionAssignReporter($id = 0)
    {
        $user_id = '';
        if (isset($_POST['user_id'])) {
            $user_id = $_POST['user_id'];

            $id = $_POST['kpi_id'];

            if (isset($_POST['remove'])) {
                KpiDataPermission::deleteAll(['user_id' => $user_id, 'kpi_id' => $_POST['kpi_id']]);

                if (KpiDataPermission::find()->where(['user_id' => $user_id])->count() <= 0) {
                    AuthAssignment::deleteAll(['user_id' => $user_id, 'item_name' => 'kpi-reporter']);
                }


            } else {
                if (AuthAssignment::find()->where(['user_id' => $user_id, 'item_name' => 'kpi-reporter'])->count() <= 0) {
                    $NewAuth = new AuthAssignment();
                    $NewAuth->item_name = 'kpi-reporter';
                    $NewAuth->user_id = $user_id;
                    $NewAuth->save();

                }


                $NewAuth = new KpiDataPermission();
                $NewAuth->kpi_id = $_POST['kpi_id'];
                $NewAuth->level = $_POST['level'];
                $NewAuth->user_id = $user_id;
                $NewAuth->assign_by = \Yii::$app->user->identity->getId();
                $NewAuth->save();
            }
        }

        $connection = Yii::$app->db;
        $data = $connection->createCommand('
select `kpi`.`kpi_data_permission`.*, profile.*  from `kpi`.`kpi_data_permission` inner join profile on profile.user_id = kpi_data_permission.user_id where `assign_by` = "' . \Yii::$app->user->identity->getId() . '" and `kpi_id` = "' . $id . '" order by profile.off_id, profile.name

            ')->queryAll();

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('assign-reporter', [
            'model' => $this->findKpiModel($id),
            'id' => $user_id,
            'kpi_id' => $id,
            'data' => $data,
            'admin_title' => 'กำหนดผู้รายงานผลตัวชี้วัด',
        ]);


    }


    protected function findKpiModel($id)
    {
        if (($model = \kpi\models\KpiList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionProfile($id = '')
    {
        if (empty($id)) {
            $id = Yii::$app->user->getId();
        }
        $model = Profile::findOne(['user_id' => $id]);

        $connection = Yii::$app->db;
        $data = $connection->createCommand('
        SELECT
auth_assignment.item_name,
auth_item.`name`,
auth_item.description
FROM
auth_assignment
JOIN auth_item
ON auth_assignment.item_name = auth_item.`name`
WHERE
auth_assignment.user_id = ' . $id . '
            ')->queryAll();
        $this->layout = '../../themes/kingadmin/layouts/main_setting';

        return $this->render('profile', ['model' => $model, 'data' => $data]);

    }


    public function actionUserList($q = '###', $page = 1)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $query = Profile::find();
        $query->select(['user_id AS id', 'name', 'surname', 'avatar_url', 'off_id', 'c_hospital.hoscode']);
        //$query->leftJoin(['user'], ['profile.user_id' => 'user.id'], []);
        $query->leftJoin('c_hospital', '`profile`.`off_id` = `c_hospital`.`hoscode`', []);

        $query->Where(['like', 'name', $q])
            ->orFilterWhere(['like', 'surname', $q]);

        $query->andWhere('profile.user_id IS NOT NULL');


        if (\Yii::$app->user->can('superadmin') || \Yii::$app->user->can('kpi-system-admin') || \Yii::$app->user->can('kpi-admin')) {
            //
        } elseif (\Yii::$app->user->can('kpi-admin-region')) {
            $query->andWhere(['in', 'c_hospital.provcode', \common\models\CProvince::getProvincesInZone(CProvince::findOne(['changwatcode' => Profile::getOffProvcode(\Yii::$app->user->identity->getId())])->zonecode)]);
        } else {
            $query->andWhere('c_hospital.provcode = "' . Profile::getOffProvcode(\yii::$app->user->identity->getId()) . '"');
        }


        $query->offset(($page - 1) * 30);
        $query->limit(30);

        $result = ['total_count' => $query->count(), 'incomplete_results' => false, 'items' => $query->all()];

        return $result;
    }


    public function actionHospitalList($q = '###', $page = 1)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $connection = Yii::$app->db;

        $sql = "select hoscode as id, hoscode, hosname
from c_hospital
where hoscode like '%" . $q . "%' or hosname like '%" . $q . "%' or hosname_long like '%" . $q . "%'
limit 30 offset " . (($page - 1) * 30);


        $qryhrm = $connection->createCommand($sql)->queryAll();

        $sql = "select COUNT(*) as total
from c_hospital
where hoscode like '%" . $q . "%' or hosname like '%" . $q . "%' or hosname_long like '%" . $q . "%'";
        $qrycount = $connection->createCommand($sql)->queryAll();

        $result = ['total_count' => $qrycount[0]['total'], 'incomplete_results' => false, 'items' => $qryhrm];

        return $result;
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateProfile($id)
    {
        $model = $this->findModel($id);


        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $user = $this->findUserModel($id);

            if ($user) {
                $user->f_name = $model->name;
                $user->l_name = $model->surname;
                $user->save();
            }

            Yii::$app->session->setFlash('success', 'บันทึกการเปลี่ยนแปลงเรียบร้อยแล้ว.');

            return $this->refresh();

        }


        $district = ArrayHelper::map(Profile::getDistrictArray($model->chw_part), 'ampurcodefull', 'ampurname');
        $subdistrict = ArrayHelper::map(Profile::getSubdistrictArray($model->amp_part), 'tamboncodefull', 'tambonname');


        $this->layout = '../../themes/kingadmin/layouts/main_setting';

        return $this->render('update', [
            'model' => $model,
            'district' => $district,
            'subdistrict' => $subdistrict,
        ]);

    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne(['user_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUserModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionGetDistrict()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = $this->MapData(Profile::getDistrictArray($province_id), 'ampurcodefull', 'ampurname');
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }


    public function actionGetSubdistrict()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
                $out = $this->MapData(Profile::getSubdistrictArray($amphur_id), 'tamboncodefull', 'tambonname');
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }


    protected function MapData($datas, $fieldId, $fieldName)
    {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }


    public function beforeAction($action)
    {
        $this->enableCsrfValidation = true;
        return parent::beforeAction($action);
    }

    public function actionKpiUpload()
    {
        Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/uploads/';


        $model = new KpiCsvImport;


        if ($model->load(Yii::$app->request->post())) {
            $model->userfile = \yii\web\UploadedFile::getInstance($model, 'userfile');

            if ($model->field_separate_char == "") {
                $model->use_csv_header = true;
                $model->field_separate_char = ',';
                $model->field_enclose_char = '';
                $model->field_escape_char = "";
                $model->encoding = 'utf8';
            }

// && $model->validate()
            if ($model->userfile && $model->validate()) {
                //$model->userfile->saveAs('uploads/' . $model->userfile->baseName . '.' . $model->userfile->extension);


                $tmp_unzip_dir = 'uploads/csv/' . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);

                $old = umask(0);
                mkdir($tmp_unzip_dir, 0777);
                umask($old);

                if ($model->userfile->extension == "zip") {
                    $zip = new \ZipArchive;
                    $res = $zip->open($model->userfile->tempName);
                    if ($res === TRUE) {
                        $zip->extractTo($tmp_unzip_dir);
                        $zip->close();
                        //echo 'woot!';
                    } else {
                        //echo 'doh!';
                    }
                } elseif ($model->userfile->extension == "csv") {
                    $model->userfile->saveAs($tmp_unzip_dir . '/' . $model->userfile->baseName . '.csv', true);
                }


                //$model->file_name = $model->file->tempName. $model->file->name ;


                foreach (glob($tmp_unzip_dir . '/*.csv') as $file) {
                    $file = basename($file, ".csv"); // $file is set to "index"

                    $model->table_name = $file;
                    $model->file_name = \Yii::$app->basePath . '/web/' . $tmp_unzip_dir . '/' . $file . '.csv';
                    $model->import();
                }

                $model->delete_files($tmp_unzip_dir);

                if ($model->error == "") {
                    Yii::$app->getSession()->setFlash('success', 'CSV data has been save to MySQL database.');
                } else {
                    Yii::$app->getSession()->setFlash('error', $model->error);
                }

//                Yii::$app->getSession()->setFlash('error', $model->table_name);



            }
        } else {
            $model->use_csv_header = true;
            $model->field_separate_char = ',';
            $model->field_enclose_char = '';
            $model->field_escape_char = "";
            $model->encoding = 'utf8';


        }

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('csv_upload', ['model' => $model]);
    }


    /**
     * Lists all Config models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConfigSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('system-config', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Lists all KpiList models.
     * @return mixed
     */
    public function actionKpiReport()
    {
        $searchModel = new KpiListSearch();
        $dataProvider = $searchModel->searchMyAssign();

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('kpi-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Timetable model.
     * If update is successful, the browser will be redirected to the 'view' page
     * @return mixed
     */
    public function actionEdit()
    {

        if (Yii::$app->request->post('hasEditable') && Yii::$app->request->post('editableKey')) {
            $model = $this->findConfigModel(Yii::$app->request->post('editableKey'));
//            $model->setScenario('timetable-edit');
            $postEditableIndex = Yii::$app->request->post('editableIndex');
            $postConfig = Yii::$app->request->post('Config')[$postEditableIndex];
            $arrayData = unserialize($model->data);

            $model->value = $output = $postConfig['value'];
            if ('' === $postConfig['value']) {
                $model->typeValue = 'string';
            } elseif ('0' === $postConfig['value']) {
                $model->typeValue = 'integer';
            }
            if (is_array($arrayData)) {
                $output = $arrayData[$model->value];
            }
            if (!$model->validate() || !$model->save(false)) {
                echo Json::encode(['output' => $output, 'message' => 'Error. ' . $model->errors['value'][0]]);
            } else {
                echo Json::encode(['output' => $output, 'message' => '']);
            }
        }
    }


    protected function findConfigModel($id)
    {
        if (($model = Config::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404);
        }
    }


    protected function findConfigModelAll($id)
    {
        if (($model = Config::find()->where(['id' => $id])->all()) !== null) {
            return $model;
        } else {
            throw new HttpException(404);
        }
    }

    public function actionMyKpi()
    {
        $searchModel = new KpiListSearch();
        $dataProvider = $searchModel->mykpi_search(Yii::$app->request->queryParams);

        $this->layout = '../../themes/kingadmin/layouts/main_setting';
        return $this->render('my-kpi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);


    }
}