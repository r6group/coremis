<?php

namespace common\models;

use vova07\fileapi\behaviors\UploadBehavior;
use Yii;

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

    /** Avatar settings */
    const AVATAR_URL = '/images/avatars';
    const AVATAR_UPLOAD_PATH = '@frontend/web/images/avatars';
    const AVATAR_UPLOAD_TEMP_PATH = '@frontend/web/images/avatars/tmp';
    const NO_AVATAR_FILENAME = 'default_avatar.gif';

    /**
     * @var string Name regular pattern
     */
    public static $patternName = '/^([ก-๙a-zа-яё]+)(-[ก-๙a-zа-яё]+)?$/iu';


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
            [['cid'], 'string', 'max' => 13],
            [['pname'], 'string', 'max' => 80],
            [['name'], 'string', 'max' => 100],
            [['name', 'cid', 'surname'], 'required'],
            [['surname'], 'string', 'max' => 120],
            [['middle_name', 'photo_path', 'position', 'dr_special', 'occptn', 'Status', 'dept_id', 'dt_term'], 'string', 'max' => 255],
            [['stf_type', 'plevel'], 'string', 'max' => 1],
            [['main_pst'], 'string', 'max' => 8],
            [['licence_no', 'insig', 'blood_group'], 'string', 'max' => 20],
            [['avatar_url'], 'string', 'max' => 64],
            [['ctzshp', 'nthlty'], 'string', 'max' => 3],
            [['religion', 'addr_part'], 'string', 'max' => 30],
            [['rd_part'], 'string', 'max' => 60],
            [['moo_part', 'chw_part'], 'string', 'max' => 2],
            [['tmb_part'], 'string', 'max' => 6],
            [['amp_part'], 'string', 'max' => 4],
            [['home_tel', 'mobile_tel', 'work_phone', 'emer_contact', 'emer_phone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 50],
            [['sps_name', 'mth_name', 'fth_name'], 'string', 'max' => 140],
            [['surname', 'name', 'middle_name'], 'trim'],
            [['surname', 'name', 'middle_name'], 'string', 'max' => 80],
            [['name', 'surname', 'gender'], 'required', 'on' => 'frontend-update-own'],
            [['surname', 'name', 'middle_name'], 'match', 'pattern' => self::$patternName],
            [['avatar_url'], 'string', 'max' => 64],
            ['user_affiliate_id', 'exist', 'targetAttribute' => 'id', 'targetClass' => User::className()]
        ];
    }
    /**
     * @return array Gender array.
     */
    public static function getGenderArray()
    {
        return [
            self::GENDER_MALE => Yii::t('app', 'ชาย'),
            self::GENDER_FEMALE => Yii::t('app', 'หญิง')
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'frontend-update-own' => ['birthday', 'gender', 'name', 'surname', 'middle_name', 'avatar_url'],
            'default' => [
                'birthday',
                'gender',
                'name',
                'surname',
                'middle_name',
                'user_affiliate_id',
                'balance',
                'bonus_balance',
                'avatar_url'
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
            'stf_id' => 'Stf ID',
            'off_id' => 'Off ID',
            'off_id18' => 'Off Id18',
            'cid' => 'Cid',
            'pname' => 'Pname',
            'name' => 'Name',
            'surname' => 'Surname',
            'middle_name' => 'Middle Name',
            'photo_path' => 'Photo Path',
            'stf_type' => 'Stf Type',
            'main_pst' => 'Main Pst',
            'position' => 'Position',
            'plevel' => 'Plevel',
            'dr_special' => 'Dr Special',
            'licence_no' => 'Licence No',
            'insig' => 'Insig',
            'birthday' => 'Birthday',
            'gender' => 'Gender',
            'avatar_url' => 'Avatar Url',
            'balance' => 'Balance',
            'bonus_balance' => 'Bonus Balance',
            'user_affiliate_id' => 'User Affiliate ID',
            'ctzshp' => 'Ctzshp',
            'nthlty' => 'Nthlty',
            'religion' => 'Religion',
            'occptn' => 'Occptn',
            'blood_group' => 'Blood Group',
            'addr_part' => 'Addr Part',
            'rd_part' => 'Rd Part',
            'moo_part' => 'Moo Part',
            'tmb_part' => 'Tmb Part',
            'amp_part' => 'Amp Part',
            'chw_part' => 'Chw Part',
            'home_tel' => 'Home Tel',
            'mobile_tel' => 'Mobile Tel',
            'email' => 'Email',
            'marry_status' => 'Marry Status',
            'sps_name' => 'Sps Name',
            'mth_name' => 'Mth Name',
            'fth_name' => 'Fth Name',
            'workgroup' => 'Workgroup',
            'Income' => 'Income',
            'last_update' => 'Last Update',
            'update_by' => 'Update By',
            'Status' => 'Status',
            'Note' => 'Note',
            'user_id' => 'User ID',
            'dept_id' => 'Dept ID',
            'dt_hired' => 'Dt Hired',
            'dt_started' => 'Dt Started',
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
        if (!empty($this->avatar_url)) {
            return self::AVATAR_URL . DIRECTORY_SEPARATOR . $this->avatar_url;
        } else {
            return self::AVATAR_URL . DIRECTORY_SEPARATOR . self::NO_AVATAR_FILENAME;
        }
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
