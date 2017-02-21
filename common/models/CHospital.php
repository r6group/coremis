<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_hospital".
 *
 * @property string $hoscode
 * @property string $hosname
 * @property string $hostype
 * @property string $address
 * @property string $road
 * @property string $mu
 * @property string $subdistcode
 * @property string $distcode
 * @property string $provcode
 * @property string $postcode
 * @property string $hoscodenew
 * @property string $bed
 * @property string $level_service
 * @property string $bedhos
 * @property integer $hdc_regist
 * @property string $h_latitude
 * @property string $h_longitude
 * @property string $h_polygon_boundary
 * @property string $h_geometry
 */
class CHospital extends \yii\db\ActiveRecord
{
    public $coordinates;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_hospital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hoscode'], 'required'],
            [['hdc_regist'], 'integer'],
            [['hoscode', 'postcode', 'bed', 'bedhos'], 'string', 'max' => 5],
            [['hosname', 'level_service'], 'string', 'max' => 255],
            [['hostype', 'mu', 'subdistcode', 'distcode', 'provcode'], 'string', 'max' => 2],
            [['address', 'road'], 'string', 'max' => 50],
            [['h_latitude', 'h_longitude'], 'string', 'max' => 20],
            [['h_polygon_boundary', 'h_geometry'], 'string'],
            [['hoscodenew'], 'string', 'max' => 9]
        ];
    }


    public function beforeSave($insert)
    {

        if(!empty($this->h_polygon_boundary)){
            $latlon = explode(",", $this->h_polygon_boundary);
            $this->h_latitude = $latlon[0];
            $this->h_longitude = $latlon[1];
        }

//        if ($insert) {
//            $this->user_id = Yii::$app->user->identity->getId();
//            $this->create_date = date('Y-m-d h:i:sa');
//        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hoscode' => 'Hoscode',
            'hosname' => 'Hosname',
            'hostype' => 'Hostype',
            'address' => 'Address',
            'road' => 'Road',
            'mu' => 'Mu',
            'subdistcode' => 'Subdistcode',
            'distcode' => 'Distcode',
            'provcode' => 'Provcode',
            'postcode' => 'Postcode',
            'hoscodenew' => 'Hoscodenew',
            'bed' => 'Bed',
            'level_service' => 'Level Service',
            'bedhos' => 'Bedhos',
            'hdc_regist' => 'Hdc Regist',
        ];
    }

    public static function  getHospitalName($hospcode)
    {
        $model = self::findOne(['hoscode' => $hospcode]);
        return isset($model)? $model->hosname : '#unknow';
    }

    public static function  getProvCode($hospcode)
    {
        $model = self::findOne(['hoscode' => $hospcode]);
        return isset($model)? $model->provcode : '#unknow';
    }

    public static function  getDistrictCode($hospcode)
    {
        $model = self::findOne(['hoscode' => $hospcode]);
        return isset($model)? $model->distcode : '#unknow';
    }

}
