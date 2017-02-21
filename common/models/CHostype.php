<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_hostype".
 *
 * @property string $hostypecode
 * @property string $hostypename
 */
class CHostype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_hostype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hostypecode'], 'required'],
            [['hostypecode'], 'string', 'max' => 2],
            [['hostypename'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hostypecode' => 'Hostypecode',
            'hostypename' => 'Hostypename',
        ];
    }
}
