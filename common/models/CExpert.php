<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_expert".
 *
 * @property string $epcode
 * @property string $prename
 * @property string $expert
 * @property string $stdcode
 * @property string $use_status
 * @property string $upd_user
 * @property string $upd_date
 */
class CExpert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_expert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['epcode'], 'required'],
            [['upd_date'], 'safe'],
            [['epcode'], 'string', 'max' => 6],
            [['prename'], 'string', 'max' => 8],
            [['expert'], 'string', 'max' => 80],
            [['stdcode'], 'string', 'max' => 10],
            [['use_status'], 'string', 'max' => 1],
            [['upd_user'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'epcode' => 'Epcode',
            'prename' => 'Prename',
            'expert' => 'Expert',
            'stdcode' => 'Stdcode',
            'use_status' => 'Use Status',
            'upd_user' => 'Upd User',
            'upd_date' => 'Upd Date',
        ];
    }
}
