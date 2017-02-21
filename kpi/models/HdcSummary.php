<?php

namespace kpi\models;

use Yii;

/**
 * This is the model class for table "s_kpi_child_specialpp".
 *
 * @property string $id
 * @property string $hospcode
 * @property string $areacode
 * @property string $flag_sent
 * @property string $date_com
 * @property string $b_year
 * @property integer $targetq1
 * @property integer $result1q1
 * @property integer $result2q1
 * @property integer $targetq2
 * @property integer $result1q2
 * @property integer $result2q2
 * @property integer $targetq3
 * @property integer $result1q3
 * @property integer $result2q3
 * @property integer $targetq4
 * @property integer $result1q4
 * @property integer $result2q4
 */
class HdcSummary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return \Yii::$app->session['s_table_name'];//'s_kpi_child_specialpp';
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
            [['id', 'hospcode', 'areacode', 'b_year'], 'required'],
            [['targetq1', 'result1q1', 'result2q1', 'targetq2', 'result1q2', 'result2q2', 'targetq3', 'result1q3', 'result2q3', 'targetq4', 'result1q4', 'result2q4'], 'integer'],
            [['id'], 'string', 'max' => 32],
            [['hospcode'], 'string', 'max' => 5],
            [['areacode'], 'string', 'max' => 8],
            [['flag_sent'], 'string', 'max' => 1],
            [['date_com'], 'string', 'max' => 14],
            [['b_year'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hospcode' => 'Hospcode',
            'areacode' => 'Areacode',
            'flag_sent' => 'Flag Sent',
            'date_com' => 'Date Com',
            'b_year' => 'B Year',
            'targetq1' => 'Targetq1',
            'result1q1' => 'Result1q1',
            'result2q1' => 'Result2q1',
            'targetq2' => 'Targetq2',
            'result1q2' => 'Result1q2',
            'result2q2' => 'Result2q2',
            'targetq3' => 'Targetq3',
            'result1q3' => 'Result1q3',
            'result2q3' => 'Result2q3',
            'targetq4' => 'Targetq4',
            'result1q4' => 'Result1q4',
            'result2q4' => 'Result2q4',
        ];
    }
}
