<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_province".
 *
 * @property string $changwatcode
 * @property string $changwatname
 * @property string $zonecode
 */
class CProvince extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['changwatcode'], 'required'],
            [['changwatcode', 'zonecode'], 'string', 'max' => 2],
            [['changwatname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'changwatcode' => 'Changwatcode',
            'changwatname' => 'Changwatname',
            'zonecode' => 'Zonecode',
        ];
    }

    public static function  getProvinceName($id)
    {
        $model = self::findOne(['changwatcode' => $id]);
        return isset($model)? $model->changwatname : '#unknow';
    }



    public static function  getProvincesInZone($zone)
    {
        $data = self::find()->select('changwatcode')->where('zonecode = "'.$zone.'"')->asArray() ;
        return isset($data)? $data : '#unknow';
    }


    public static function  getZoneFromProvcode($provcode)
    {
        $model = self::findOne(['changwatcode' => $provcode]);
        return isset($model)? $model->zonecode : '#unknow';

    }

}
