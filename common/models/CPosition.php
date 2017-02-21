<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_position".
 *
 * @property string $poscode
 * @property string $shortpre
 * @property string $longpre
 * @property string $posname
 * @property string $kp
 * @property string $is_moph_pos
 */
class CPosition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poscode'], 'required'],
            [['poscode', 'shortpre'], 'string', 'max' => 5],
            [['longpre'], 'string', 'max' => 20],
            [['posname'], 'string', 'max' => 60],
            [['kp', 'is_moph_pos'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'poscode' => 'Poscode',
            'shortpre' => 'Shortpre',
            'longpre' => 'Longpre',
            'posname' => 'Posname',
            'kp' => 'Kp',
            'is_moph_pos' => 'Is Moph Pos',
        ];
    }


    public static function  getPositionName($poscode)
    {
        $model = self::findOne(['poscode' => $poscode]);
        return isset($model)? $model->shortpre.$model->posname : '#unknow';
    }
}
