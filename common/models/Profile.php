<?php

namespace common\models;

use vova07\fileapi\behaviors\UploadBehavior;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property string $stf_id
 * @property string $off_id
 * @property string $off_id18
 * @property string $cid
 * @property string $pname
 * @property string $name
 * @property string $surname
 * @property string $middle_name
 * @property string $photo_path
 * @property string $stf_type
 * @property string $main_pst
 * @property string $position
 * @property string $plevel
 * @property string $dr_special
 * @property string $licence_no
 * @property string $insig
 * @property string $birthday
 * @property integer $gender
 * @property string $avatar_url
 * @property string $balance
 * @property string $bonus_balance
 * @property integer $user_affiliate_id
 * @property string $ctzshp
 * @property string $nthlty
 * @property string $religion
 * @property string $occptn
 * @property string $blood_group
 * @property string $addr_part
 * @property string $rd_part
 * @property string $moo_part
 * @property string $tmb_part
 * @property string $amp_part
 * @property string $chw_part
 * @property string $home_tel
 * @property string $mobile_tel
 * @property string $email
 * @property string $marry_status
 * @property string $sps_name
 * @property string $mth_name
 * @property string $fth_name
 * @property integer $workgroup
 * @property string $Income
 * @property string $last_update
 * @property integer $update_by
 * @property string $Status
 * @property string $Note
 * @property integer $user_id
 * @property string $dept_id
 * @property string $dt_hired
 * @property string $dt_started
 * @property string $dt_term
 * @property string $work_phone
 * @property string $phone_ext
 * @property string $emer_contact
 * @property string $emer_phone
 */
class Profile extends \yii\db\ActiveRecord
{
    /** Gender */
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    /** Stftype */
    const STF_OFFICER = 1;
    const STF_WORKER_BY_GOV = 2;
    const STF_WORKER_BY_MOPH = 3;
    const STF_WORKER = 4;
    const STF_TMP_WORKER = 5;

    /** Status */
    const STATUS_ACTIVE = 1;
    const STATUS_TMP_IN_ACTIVE = 2;
    const STATUS_TMP_OUT = 3;
    const STATUS_TMP_EDU = 4;
    const STATUS_MOVED = 5;
    const STATUS_RETIRE = 6;

    /** Avatar settings */
    const AVATAR_URL = 'http://zone6.cbo.moph.go.th/phi/images/avatars/'; ///images/avatars/
    const AVATAR_UPLOAD_PATH = '@phi/web/images/avatars';
    const AVATAR_UPLOAD_TEMP_PATH = '@phi/web/images/avatars/tmp';
    const NO_AVATAR_FILENAME = 'unknown_user.png';

    /** Mstatus */
    const MSTATUS_SINGLE = 0;
    const MSTATUS_MARRIED = 1;
    const MSTATUS_WIDOWED = 2;
    const MSTATUS_DIVORCE = 3;
    const MSTATUS_SPLIT = 4;

    /** Blood group */
    const BG_A = 'A';
    const BG_B = 'B';
    const BG_AB = 'AB';
    const BG_O = 'O';


    /**
     * @var string Name regular pattern
     */
    public static $patternName = '/^([ก-๙a-zа-яё]+)(-[ก-๙a-zа-яё]+)?$/iu';
    public static $patternPhone = '/^[0-9]{10,10}$/';
    public static $patternCID = '/^[0-9]{13,13}$/';





    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @return string User full name
     */
    public static function getFullNameByUserId($id)
    {
        return self::findOne(['user_id' => $id])->getFullName();
    }

    /**
     * @return string User full name
     */
    public function getFullName()
    {
        return $this->name . ' ' . $this->surname;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birthday'], 'date', 'format' => 'php:Y-m-d'],
            ['user_affiliate_id', 'integer', 'min' => 1],
            [
                'user_affiliate_id',
                'compare',
                'compareAttribute' => 'user_id',
                'operator' => '!==',
                'message' => Yii::t('app', 'Can not be yourself affiliate')
            ],
            ['gender', 'in', 'range' => array_keys(static::getGenderArray())],
            [['balance', 'bonus_balance'], 'default', 'value' => '0.00'],
            [['id', 'workgroup', 'update_by', 'user_id'], 'integer'],
            [['last_update', 'dt_hired', 'dt_started'], 'safe'],
            [['balance', 'bonus_balance', 'Income'], 'number'],
            [['Note'], 'string'],
            [['stf_id', 'marry_status', 'phone_ext'], 'string', 'max' => 10],
            [['off_id', 'off_id18'], 'string', 'max' => 9],
            ['cid', 'match', 'pattern' => self::$patternCID],
            [['pname'], 'string', 'max' => 80],
            [['name'], 'string', 'max' => 100],
            [['surname'], 'string', 'max' => 120],
            [['middle_name', 'photo_path', 'position', 'dr_special', 'occptn', 'Status', 'dept_id', 'dt_term'], 'string', 'max' => 255],
            [['stf_type', 'plevel'], 'string', 'max' => 2],
            //['stf_type', 'in', 'range' => array_keys(static::getStftypeArray())],
            //['plevel', 'in', 'range' => array_keys(static::getPostypeArray())],
            [['main_pst'], 'string', 'max' => 8],
            //['main_pst', 'in', 'range' => array_keys(static::getPositionArray())],
            //['dr_special', 'in', 'range' => array_keys(static::getSpArray())],
            //['pname', 'in', 'range' => array_keys(static::getTitlesArray())],
            [['licence_no', 'insig', 'blood_group'], 'string', 'max' => 20],
            [['avatar_url'], 'string', 'max' => 64],
            [['ctzshp', 'nthlty'], 'string', 'max' => 3],
            [['religion', 'addr_part'], 'string', 'max' => 30],
            [['rd_part'], 'string', 'max' => 60],
            [['moo_part', 'chw_part'], 'string', 'max' => 2],
            [['tmb_part'], 'string', 'max' => 6],
            [['amp_part'], 'string', 'max' => 4],
            [['home_tel', 'work_phone', 'emer_contact', 'emer_phone'], 'string', 'max' => 15],
            ['mobile_tel', 'string', 'length' => [10, 10]],
            ['mobile_tel', 'match', 'pattern' => self::$patternPhone],
            ['email', 'email'],
            [['sps_name', 'mth_name', 'fth_name'], 'string', 'max' => 140],
            [['surname', 'name', 'middle_name'], 'trim'],
            [['surname', 'name', 'middle_name'], 'string', 'max' => 80],
            //[['name', 'surname', 'gender'], 'required', 'on' => 'frontend-update-own'],
            [['surname', 'name', 'middle_name'], 'match', 'pattern' => self::$patternName],
            [['avatar_url'], 'string', 'max' => 64],
            ['user_affiliate_id', 'exist', 'targetAttribute' => 'id', 'targetClass' => User::className()],
            [['name', 'surname', 'cid', 'email', 'off_id' ], 'required'],
        ];
    }

    /**
     * @return array Gender array.
     */
    public static function getGenderArray()
    {
        return [
            self::GENDER_MALE => 'ชาย',
            self::GENDER_FEMALE => 'หญิง'
        ];
    }

    public static function getStftypeArray()
    {
        return [
            self::STF_OFFICER => 'ข้าราชการ',
            self::STF_WORKER_BY_GOV => 'พนักงานของรัฐ',
            self::STF_WORKER_BY_MOPH => 'พกส.',
            self::STF_WORKER => 'ลูกจ้างทั่วไป',
            self::STF_TMP_WORKER => 'ลูกจ้างชั่วคราว',
        ];
    }

    public static function getStatusArray()
    {
        return [
            self::STATUS_ACTIVE => 'ปฏิบัติงานปกติ',
            self::STATUS_TMP_IN_ACTIVE => 'มาช่วยราชการ',
            self::STATUS_TMP_OUT => 'ไปช่วยราชการ',
            self::STATUS_TMP_EDU => 'ลาศึกษาต่อ',
            self::STATUS_MOVED => 'ย้ายออกนอกจังหวัด',
            self::STATUS_RETIRE => 'จำหน่าย (เกษียณอายุ/ลาออก/เสียชีวิต)',

        ];
    }


    public static function getMstatusArray()
    {
        return [
            self::MSTATUS_SINGLE => 'โสด',
            self::MSTATUS_MARRIED => 'สมรส',
            self::MSTATUS_WIDOWED => 'ม่าย',
            self::MSTATUS_DIVORCE => 'หย่า',
            self::MSTATUS_SPLIT => 'แยกทาง',
        ];
    }


    public static function getBloodGroupArray()
    {
        return [
            self::BG_A => 'A',
            self::BG_B => 'B',
            self::BG_AB => 'AB',
            self::BG_O => 'O',
        ];
    }

    public static function  getEduArray()
    {
        $result = \common\models\CEducation::getDb()->cache(function ($db) {
            return ArrayHelper::map(\common\models\CEducation::find()->orderBy('education')->all(), 'id', 'education');
        });
        return $result;
    }

    public static function  getPositionArray()
    {
        return ArrayHelper::map(\common\models\CPosition::find()->where(['is_moph_pos' => '1'])->orderBy('full_posname')->all(), 'poscode', 'full_posname');
    }

    public static function  getHosArray($provcode, $distcode = '')
    {



        if (empty($distcode)) {
            $sql = 'SELECT hoscode, CONCAT(hoscode,\' \',hosname) AS hosname FROM c_hospital WHERE provcode=:provcode ORDER BY hoscode';
            $hosp = CHospital::getDb()->cache(function ($db) USE ($sql, $provcode, $distcode) {
                return CHospital::findBySql($sql, ['provcode'=>$provcode])->all();
            });
            //$hosp = CHospital::findBySql($sql, ['provcode'=>$provcode])->all();
        } else {
            $sql = 'SELECT hoscode, CONCAT(hoscode,\' \',hosname) AS hosname FROM c_hospital WHERE provcode=:provcode AND distcode=:distcode ORDER BY hoscode';
            $hosp = CHospital::getDb()->cache(function ($db) USE ($sql, $provcode, $distcode) {
                return CHospital::findBySql($sql, ['provcode'=>$provcode, 'distcode'=>$distcode])->all();
            });
            //$hosp = CHospital::findBySql($sql, ['provcode'=>$provcode, 'distcode'=>$distcode])->all();
        }

        return ArrayHelper::map($hosp, 'hoscode', 'hosname');

    }

    public static function  getCupArray($provcode)
    {
        $result = \common\models\CMastercup::getDb()->cache(function ($db) use ($provcode) {
            return ArrayHelper::map(\common\models\CMastercup::find()->where(['province_id' => $provcode.'00'])->andWhere('hospcode5 = hsub') ->orderBy('hsub')->all(), 'hsub', 'hmainname');
        });
        return $result;

    }

    public static function  getExpertArray()
    {
        return ArrayHelper::map(\common\models\CExpert::find()->orderBy('expert')->all(), 'epcode', 'expert');
    }

    public static function  getTitlesArray()
    {
        return ArrayHelper::map(\common\models\CTitles::find()->orderBy('title_Desc')->all(), 'title_Code', 'title_Desc');
    }

    public static function  getSpArray()
    {
        return ArrayHelper::map(\common\models\CSpcode::find()->orderBy('spdesc')->all(), 'spcode', 'spdesc');
    }

    public static function  getEpnposArray()
    {
        return ArrayHelper::map(\common\models\CEpnposwork::find()->orderBy('wrknm')->all(), 'wrkcode', 'wrknm');
    }

    public static function  getPostypeArray()
    {
        return ArrayHelper::map(\common\models\CPostype::find()->orderBy('postype_code')->all(), 'postype_code', 'postype_name');
    }

    public static function  getPostypenameArray()
    {
        return ArrayHelper::map(\common\models\CPostype::find()->orderBy('postype_code')->all(), 'postype_code', 'postype_shortname');
    }

    public static function  getProvinceArray()
    {
        $result = \common\models\CProvince::getDb()->cache(function ($db) {
            return ArrayHelper::map(\common\models\CProvince::find()->select(['changwatcode', 'changwatname'])->orderBy('changwatname')->all(), 'changwatcode', 'changwatname');
        });
        return $result;
        //return ArrayHelper::map(\common\models\CProvince::find()->select(['changwatcode', 'changwatname'])->orderBy('changwatname')->all(), 'changwatcode', 'changwatname');
    }

    public static function  getDistrictArray($province_id)
    {
        $result = \common\models\CDistrict::getDb()->cache(function ($db) USE ($province_id) {
            return \common\models\CDistrict::find()->select(['ampurcodefull', 'ampurname'])->where(['changwatcode' => $province_id])->andWhere('ampurname NOT LIKE "*%"') ->orderBy('ampurname')->all();
        });
        return $result;

    }


    public static function  getSubdistrictArray($amphur_id)
    {
        $result = \common\models\CSubdistrict::getDb()->cache(function ($db) USE ($amphur_id) {
            return \common\models\CSubdistrict::find()->select(['tamboncodefull', 'tambonname'])->where(['ampurcode' => $amphur_id])->andWhere('tambonname NOT LIKE "*%"')->orderBy('tambonname')->all();
        });
        return $result;

    }

    public function  getDistrictnameArray($province_id)
    {

        return ArrayHelper::map($this->getDistrictArray($province_id), 'ampurcodefull', 'ampurname');
    }


    public function  getSubdistrictnameArray($amphur_id)
    {
        return ArrayHelper::map($this->getSubdistrictArray($amphur_id), 'tamboncodefull', 'tambonname');
    }

    public function setBankIfNull($value)
    {
        return $value ? $value : '';
    }


    public static function  getWorkgroup($workgroup_id, $root_prefix = true)
    {
        if (empty($workgroup_id)) {
            return '';
        }

        $sql = "SELECT
                  w.`name`,
                  IF(w.root <> w.id, (SELECT root0.`name` FROM work_group root0 WHERE root0.id = w.root), NULL) AS `type`
                FROM work_group w
                WHERE w.id = " . $workgroup_id;

        if ($data = WorkGroup::findBySql($sql)->one()) {
            $result = '';
            $rootname = $data->type ? $data->type . ' > ' : '';

            ($root_prefix == true) ? $result = $rootname . $data->name : $result = $data->name ;
            return $result;

        }
        return '';
    }

    public static function  getWorkgroupNames($workgroup_array, $root_prefix = true)
    {
        if (empty($workgroup_array)) {
            return '';
        }

        $sql = "SELECT
                  w.`name`,
                  IF(w.root <> w.id, (SELECT root0.`name` FROM work_group root0 WHERE root0.id = w.root), NULL) AS `type`
                FROM work_group w
                WHERE w.id IN (" . $workgroup_array. ")";

        $datas = WorkGroup::findBySql($sql)->all();
        $result = '';
        foreach ($datas as $data) {
            $rootname = $data->type ? $data->type . ' > ' : '';



            ($root_prefix == true) ? $result .= $rootname . $data->name . ', ' : $result .= $data->name . ', ';
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'frontend-update-own' => ['name', 'surname', 'pname', 'gender', 'birthday', 'mobile_tel', 'email', 'avatar_url'],
            'frontend-update-avatar' => ['avatar_url'],
            'default' => [
                'stf_id',
                'off_id',
                'off_id18',
                'cid',
                'pname',
                'name',
                'surname',
                'stf_type',
                'main_pst',
                'plevel',
                'dr_special',
                'licence_no',
                'birthday',
                'gender',
                'blood_group',
                'addr_part',
                'rd_part',
                'moo_part',
                'tmb_part',
                'amp_part',
                'chw_part',
                'home_tel',
                'mobile_tel',
                'email',
                'marry_status',
                'workgroup',
                'Income',
                'Status',
                'Note',
//                'middle_name',
//                'photo_path',
//                'position',
//                'insig',
//                'avatar_url',
//                'balance',
//                'bonus_balance' ,
//                'user_affiliate_id',
//                'ctzshp',
//                'nthlty',
//                'religion',
//                'occptn',
//                'sps_name',
//                'mth_name',
//                'fth_name',
//                'last_update',
//                'update_by',
//                'user_id',
//                'dept_id',
//                'dt_hired',
//                'dt_started',
//                'dt_term',
//                'work_phone',
//                'phone_ext',
//                'emer_contact',
//                'emer_phone',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stf_id' => 'เลขที่ตำแหน่ง',
            'off_id' => '* หน่วยงานที่ปฏิบัติงานปัจจุบัน',
            'off_id18' => 'หน่วยงานตาม จ.18',
            'cid' => '* เลขประจำตัวประชาชน',
            'pname' => 'คำนำหน้า',
            'name' => '* ชื่อ',
            'surname' => '* นามสกุล',
            'middle_name' => 'Middle Name',
            'photo_path' => 'Photo Path',
            'stf_type' => 'ประเภทบุคลากร',
            'main_pst' => 'ตำแหน่ง',
            'position' => 'Position',
            'plevel' => 'ประเภทตำแหน่ง',
            'dr_special' => 'สาขาเฉพาะทาง',
            'licence_no' => 'เลขที่ใบประกอบวิชาชีพ',
            'insig' => 'Insig',
            'birthday' => 'ว/ด/ป เกิด',
            'gender' => 'เพศ',
            'avatar_url' => 'รูปประจำตัว',
            'balance' => 'Balance',
            'bonus_balance' => 'Bonus Balance',
            'user_affiliate_id' => 'User Affiliate ID',
            'ctzshp' => 'Ctzshp',
            'nthlty' => 'Nthlty',
            'religion' => 'Religion',
            'occptn' => 'Occptn',
            'blood_group' => 'หมู่เลือด',
            'addr_part' => 'ที่อยู่',
            'rd_part' => 'ถนน/ตรอก/ซอย',
            'moo_part' => 'หมู่',
            'tmb_part' => 'ตำบล',
            'amp_part' => 'อำเภอ',
            'chw_part' => 'จังหวัด',
            'home_tel' => 'Home Tel',
            'mobile_tel' => 'Mobile Tel',
            'email' => '* Email',
            'marry_status' => 'สถานภาพสมรส',
            'sps_name' => 'Sps Name',
            'mth_name' => 'Mth Name',
            'fth_name' => 'Fth Name',
            'workgroup' => 'กลุ่มงาน/งาน/แผนก',
            'Income' => 'เงินเดือนปัจจุบัน',
            'last_update' => 'วันที่ปรับปรุงข้อมูลล่าสุด',
            'update_by' => 'ปรับปรุงข้อมูลโดย',
            'Status' => 'สถานะ',
            'Note' => 'Note',
            'user_id' => 'User ID',
            'dept_id' => 'Dept ID',
            'dt_hired' => 'วันที่บรรจุ',
            'dt_started' => 'วันเริ่มทำงาน',
            'dt_term' => 'Dt Term',
            'work_phone' => 'Work Phone',
            'phone_ext' => 'Phone Ext',
            'emer_contact' => 'Emer Contact',
            'emer_phone' => 'Emer Phone',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'avatar_url' => [
                        'path' => self::AVATAR_UPLOAD_PATH,
                        'tempPath' => self::AVATAR_UPLOAD_TEMP_PATH,
                        'url' => self::AVATAR_URL
                    ]
                ]
            ]
        ];
    }

    public function getFullAvatarUrl()
    {
//        if (!empty($this->avatar_url)) {
//            return \Yii::getAlias('@web'). self::AVATAR_URL .$this->avatar_url;
//        } else {
//            return  \Yii::getAlias('@web'). self::AVATAR_URL . self::NO_AVATAR_FILENAME;
//        }

//        if (!empty($this->avatar_url)) {
//
//            return Url::toRoute('/images/avatars/') . $this->avatar_url;
//        } else {
//            return Url::toRoute('/images/avatars/') . self::NO_AVATAR_FILENAME;
//        }

        if (!empty($this->avatar_url)) {

            return 'http://zone6.cbo.moph.go.th/phi/images/avatars/' . $this->avatar_url;
        } else {
            return 'http://zone6.cbo.moph.go.th/phi/images/avatars/' . self::NO_AVATAR_FILENAME;
        }

    }

    /**
     * @return string User Avatar
     */
    public static function getAvatarByUserId($id)
    {
        $model = self::findOne(['user_id' => $id]);

        return $model ?  $model->getFullAvatarUrl() : 'http://zone6.cbo.moph.go.th/phi/images/avatars/' . self::NO_AVATAR_FILENAME;

    }


    /**
     * @return string User Avatar
     */
    public static function getOffProvcode($id)
    {
        return \common\models\CHospital::getProvCode(self::findOne(['user_id' => $id])->off_id);

    }


    /**
     * @return string User Avatar
     */
    public static function getProfileByUserId($id)
    {
        return self::findOne(['user_id' => $id]);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAffiliate()
    {
        return $this->hasOne(User::className(), ['id' => 'user_affiliate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfileAffiliate()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'user_affiliate_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        // Updates a timestamp attribute to the current timestamp
        if (!$insert) {
            User::findIdentity($this->user_id)->touch('updated_at');
        }
    }



}
