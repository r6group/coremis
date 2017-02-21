<?php

namespace kpi\models;

use Yii;

/**
 * This is the model class for table "co_province".
 *
 * @property integer $province_id
 * @property string $provid
 * @property string $provname
 * @property integer $geo_id
 * @property string $zoneid
 * @property string $regionid
 * @property string $coordinates
 * @property string $last_update
 */
class CoProvince extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'co_province';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_kpi');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provid', 'provname'], 'required'],
            [['geo_id'], 'integer'],
            [['coordinates'], 'string'],
            [['last_update'], 'safe'],
            [['provid', 'zoneid', 'regionid'], 'string', 'max' => 2],
            [['provname'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'province_id' => 'Province ID',
            'provid' => 'Provid',
            'provname' => 'Provname',
            'geo_id' => 'Geo ID',
            'zoneid' => 'Zoneid',
            'regionid' => 'Regionid',
            'coordinates' => 'Coordinates',
            'last_update' => 'Last Update',
        ];
    }
}
