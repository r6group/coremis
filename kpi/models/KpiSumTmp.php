<?php

namespace kpi\models;

use Yii;

/**
 * This is the model class for table "kpi_sum_23".
 *
 * @property string $hospcode
 * @property string $kpi_year
 * @property string $kpi_no
 * @property string $kpi_provcode
 * @property string $kpi_fixed_a_value
 * @property string $kpi_fixed_b_value
 * @property string $kpi_fixed_c_value
 * @property string $kpi_fixed_d_value
 * @property string $kpi_fixed_e_value
 * @property string $kpi_fixed_f_value
 * @property string $kpi_a_value_q1
 * @property string $kpi_b_value_q1
 * @property string $kpi_c_value_q1
 * @property string $kpi_d_value_q1
 * @property string $kpi_e_value_q1
 * @property string $kpi_f_value_q1
 * @property string $kpi_a_value_q2
 * @property string $kpi_b_value_q2
 * @property string $kpi_c_value_q2
 * @property string $kpi_d_value_q2
 * @property string $kpi_e_value_q2
 * @property string $kpi_f_value_q2
 * @property string $kpi_a_value_q3
 * @property string $kpi_b_value_q3
 * @property string $kpi_c_value_q3
 * @property string $kpi_d_value_q3
 * @property string $kpi_e_value_q3
 * @property string $kpi_f_value_q3
 * @property string $kpi_a_value_q4
 * @property string $kpi_b_value_q4
 * @property string $kpi_c_value_q4
 * @property string $kpi_d_value_q4
 * @property string $kpi_e_value_q4
 * @property string $kpi_f_value_q4
 * @property string $status
 */
class KpiSumTmp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_sum_'. \Yii::$app->user->identity->getId();
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
            [['hospcode', 'kpi_year', 'kpi_no', 'kpi_provcode'], 'required'],
            [['kpi_fixed_a_value', 'kpi_fixed_b_value', 'kpi_fixed_c_value', 'kpi_fixed_d_value', 'kpi_fixed_e_value', 'kpi_fixed_f_value', 'kpi_a_value_q1', 'kpi_b_value_q1', 'kpi_c_value_q1', 'kpi_d_value_q1', 'kpi_e_value_q1', 'kpi_f_value_q1', 'kpi_a_value_q2', 'kpi_b_value_q2', 'kpi_c_value_q2', 'kpi_d_value_q2', 'kpi_e_value_q2', 'kpi_f_value_q2', 'kpi_a_value_q3', 'kpi_b_value_q3', 'kpi_c_value_q3', 'kpi_d_value_q3', 'kpi_e_value_q3', 'kpi_f_value_q3', 'kpi_a_value_q4', 'kpi_b_value_q4', 'kpi_c_value_q4', 'kpi_d_value_q4', 'kpi_e_value_q4', 'kpi_f_value_q4'], 'number'],
            [['hospcode', 'kpi_no'], 'string', 'max' => 5],
            [['kpi_year'], 'string', 'max' => 4],
            [['kpi_provcode'], 'string', 'max' => 2],
            [['status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hospcode' => 'Hospcode',
            'kpi_year' => 'Kpi Year',
            'kpi_no' => 'Kpi No',
            'kpi_provcode' => 'Kpi Provcode',
            'kpi_fixed_a_value' => 'Kpi Fixed A Value',
            'kpi_fixed_b_value' => 'Kpi Fixed B Value',
            'kpi_fixed_c_value' => 'Kpi Fixed C Value',
            'kpi_fixed_d_value' => 'Kpi Fixed D Value',
            'kpi_fixed_e_value' => 'Kpi Fixed E Value',
            'kpi_fixed_f_value' => 'Kpi Fixed F Value',
            'kpi_a_value_q1' => 'Kpi A Value Q1',
            'kpi_b_value_q1' => 'Kpi B Value Q1',
            'kpi_c_value_q1' => 'Kpi C Value Q1',
            'kpi_d_value_q1' => 'Kpi D Value Q1',
            'kpi_e_value_q1' => 'Kpi E Value Q1',
            'kpi_f_value_q1' => 'Kpi F Value Q1',
            'kpi_a_value_q2' => 'Kpi A Value Q2',
            'kpi_b_value_q2' => 'Kpi B Value Q2',
            'kpi_c_value_q2' => 'Kpi C Value Q2',
            'kpi_d_value_q2' => 'Kpi D Value Q2',
            'kpi_e_value_q2' => 'Kpi E Value Q2',
            'kpi_f_value_q2' => 'Kpi F Value Q2',
            'kpi_a_value_q3' => 'Kpi A Value Q3',
            'kpi_b_value_q3' => 'Kpi B Value Q3',
            'kpi_c_value_q3' => 'Kpi C Value Q3',
            'kpi_d_value_q3' => 'Kpi D Value Q3',
            'kpi_e_value_q3' => 'Kpi E Value Q3',
            'kpi_f_value_q3' => 'Kpi F Value Q3',
            'kpi_a_value_q4' => 'Kpi A Value Q4',
            'kpi_b_value_q4' => 'Kpi B Value Q4',
            'kpi_c_value_q4' => 'Kpi C Value Q4',
            'kpi_d_value_q4' => 'Kpi D Value Q4',
            'kpi_e_value_q4' => 'Kpi E Value Q4',
            'kpi_f_value_q4' => 'Kpi F Value Q4',
            'status' => 'Status',
        ];
    }
}
