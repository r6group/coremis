<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_postype".
 *
 * @property integer $postype_code
 * @property string $postype_name
 */
class CPostype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_postype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['postype_name'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'postype_code' => 'Postype Code',
            'postype_name' => 'Postype Name',
        ];
    }
}
