<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_epnposwork".
 *
 * @property string $wrkcode
 * @property integer $gcode
 * @property integer $grpcode
 * @property string $wrknm
 * @property integer $levels
 * @property string $minwages
 * @property string $maxwages
 * @property string $wrkatrb
 * @property string $note
 * @property string $numcode
 * @property string $newmin
 * @property string $newmax
 * @property string $stdcode
 * @property string $use_status
 * @property string $upd_user
 * @property string $upd_date
 */
class CEpnposwork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_epnposwork';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wrkcode'], 'required'],
            [['gcode', 'grpcode', 'levels'], 'integer'],
            [['wrkcode', 'numcode', 'newmax'], 'string', 'max' => 5],
            [['wrknm', 'wrkatrb', 'note'], 'string', 'max' => 100],
            [['minwages', 'maxwages', 'newmin', 'stdcode'], 'string', 'max' => 10],
            [['use_status'], 'string', 'max' => 1],
            [['upd_user', 'upd_date'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wrkcode' => 'Wrkcode',
            'gcode' => 'Gcode',
            'grpcode' => 'Grpcode',
            'wrknm' => 'Wrknm',
            'levels' => 'Levels',
            'minwages' => 'Minwages',
            'maxwages' => 'Maxwages',
            'wrkatrb' => 'Wrkatrb',
            'note' => 'Note',
            'numcode' => 'Numcode',
            'newmin' => 'Newmin',
            'newmax' => 'Newmax',
            'stdcode' => 'Stdcode',
            'use_status' => 'Use Status',
            'upd_user' => 'Upd User',
            'upd_date' => 'Upd Date',
        ];
    }
}
