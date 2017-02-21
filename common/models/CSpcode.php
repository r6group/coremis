<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_spcode".
 *
 * @property string $spcode
 * @property string $spdesc
 * @property string $groupid
 * @property string $spcodeold
 * @property string $splevel
 * @property integer $poscode
 */
class CSpcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_spcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['spcode'], 'required'],
            [['poscode'], 'integer'],
            [['spcode'], 'string', 'max' => 4],
            [['spdesc'], 'string', 'max' => 150],
            [['groupid', 'spcodeold'], 'string', 'max' => 2],
            [['splevel'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'spcode' => 'Spcode',
            'spdesc' => 'Spdesc',
            'groupid' => 'Groupid',
            'spcodeold' => 'Spcodeold',
            'splevel' => 'Splevel',
            'poscode' => 'Poscode',
        ];
    }
}
