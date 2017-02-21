<?php

namespace kpi\models;

use Yii;

/**
 * This is the model class for table "kpi_data".
 *
 * @property integer $id
 * @property string $hospcode
 * @property string $kpi_year
 * @property string $kpi_no
 * @property integer $kpi_id
 * @property string $provcode
 * @property string $distcode
 * @property string $subdistcode
 * @property double $kpi_a_value_10
 * @property double $kpi_b_value_10
 * @property double $kpi_c_value_10
 * @property double $kpi_d_value_10
 * @property double $kpi_e_value_10
 * @property double $kpi_f_value_10
 * @property double $kpi_a_value_11
 * @property double $kpi_b_value_11
 * @property double $kpi_c_value_11
 * @property double $kpi_d_value_11
 * @property double $kpi_e_value_11
 * @property double $kpi_f_value_11
 * @property double $kpi_a_value_12
 * @property double $kpi_b_value_12
 * @property double $kpi_c_value_12
 * @property double $kpi_d_value_12
 * @property double $kpi_e_value_12
 * @property double $kpi_f_value_12
 * @property double $kpi_a_value_1
 * @property double $kpi_b_value_1
 * @property double $kpi_c_value_1
 * @property double $kpi_d_value_1
 * @property double $kpi_e_value_1
 * @property double $kpi_f_value_1
 * @property double $kpi_a_value_2
 * @property double $kpi_b_value_2
 * @property double $kpi_c_value_2
 * @property double $kpi_d_value_2
 * @property double $kpi_e_value_2
 * @property double $kpi_f_value_2
 * @property double $kpi_a_value_3
 * @property double $kpi_b_value_3
 * @property double $kpi_c_value_3
 * @property double $kpi_d_value_3
 * @property double $kpi_e_value_3
 * @property double $kpi_f_value_3
 * @property double $kpi_a_value_4
 * @property double $kpi_b_value_4
 * @property double $kpi_c_value_4
 * @property double $kpi_d_value_4
 * @property double $kpi_e_value_4
 * @property double $kpi_f_value_4
 * @property double $kpi_a_value_5
 * @property double $kpi_b_value_5
 * @property double $kpi_c_value_5
 * @property double $kpi_d_value_5
 * @property double $kpi_e_value_5
 * @property double $kpi_f_value_5
 * @property double $kpi_a_value_6
 * @property double $kpi_b_value_6
 * @property double $kpi_c_value_6
 * @property double $kpi_d_value_6
 * @property double $kpi_e_value_6
 * @property double $kpi_f_value_6
 * @property double $kpi_a_value_7
 * @property double $kpi_b_value_7
 * @property double $kpi_c_value_7
 * @property double $kpi_d_value_7
 * @property double $kpi_e_value_7
 * @property double $kpi_f_value_7
 * @property double $kpi_a_value_8
 * @property double $kpi_b_value_8
 * @property double $kpi_c_value_8
 * @property double $kpi_d_value_8
 * @property double $kpi_e_value_8
 * @property double $kpi_f_value_8
 * @property double $kpi_a_value_9
 * @property double $kpi_b_value_9
 * @property double $kpi_c_value_9
 * @property double $kpi_d_value_9
 * @property double $kpi_e_value_9
 * @property double $kpi_f_value_9
 * @property integer $reporter_id
 * @property string $note
 * @property string $last_update
 */
class KpiData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_data';
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
            [['hospcode', 'kpi_year', 'kpi_no'], 'required'],
            [['kpi_id', 'reporter_id'], 'integer'],
            [['kpi_a_value_10', 'kpi_b_value_10', 'kpi_c_value_10', 'kpi_d_value_10', 'kpi_e_value_10', 'kpi_f_value_10', 'kpi_a_value_11', 'kpi_b_value_11', 'kpi_c_value_11', 'kpi_d_value_11', 'kpi_e_value_11', 'kpi_f_value_11', 'kpi_a_value_12', 'kpi_b_value_12', 'kpi_c_value_12', 'kpi_d_value_12', 'kpi_e_value_12', 'kpi_f_value_12', 'kpi_a_value_1', 'kpi_b_value_1', 'kpi_c_value_1', 'kpi_d_value_1', 'kpi_e_value_1', 'kpi_f_value_1', 'kpi_a_value_2', 'kpi_b_value_2', 'kpi_c_value_2', 'kpi_d_value_2', 'kpi_e_value_2', 'kpi_f_value_2', 'kpi_a_value_3', 'kpi_b_value_3', 'kpi_c_value_3', 'kpi_d_value_3', 'kpi_e_value_3', 'kpi_f_value_3', 'kpi_a_value_4', 'kpi_b_value_4', 'kpi_c_value_4', 'kpi_d_value_4', 'kpi_e_value_4', 'kpi_f_value_4', 'kpi_a_value_5', 'kpi_b_value_5', 'kpi_c_value_5', 'kpi_d_value_5', 'kpi_e_value_5', 'kpi_f_value_5', 'kpi_a_value_6', 'kpi_b_value_6', 'kpi_c_value_6', 'kpi_d_value_6', 'kpi_e_value_6', 'kpi_f_value_6', 'kpi_a_value_7', 'kpi_b_value_7', 'kpi_c_value_7', 'kpi_d_value_7', 'kpi_e_value_7', 'kpi_f_value_7', 'kpi_a_value_8', 'kpi_b_value_8', 'kpi_c_value_8', 'kpi_d_value_8', 'kpi_e_value_8', 'kpi_f_value_8', 'kpi_a_value_9', 'kpi_b_value_9', 'kpi_c_value_9', 'kpi_d_value_9', 'kpi_e_value_9', 'kpi_f_value_9'], 'number'],
            [['note'], 'string'],
            [['last_update'], 'safe'],
            [['hospcode', 'kpi_no'], 'string', 'max' => 5],
            [['kpi_year', 'distcode'], 'string', 'max' => 4],
            [['provcode'], 'string', 'max' => 2],
            [['subdistcode'], 'string', 'max' => 6],
            [['hospcode', 'kpi_year', 'kpi_id'], 'unique', 'targetAttribute' => ['hospcode', 'kpi_year', 'kpi_id'], 'message' => 'The combination of Hospcode, Kpi Year and Kpi ID has already been taken.']
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
            'kpi_year' => 'Kpi Year',
            'kpi_no' => 'Kpi No',
            'kpi_id' => 'Kpi ID',
            'provcode' => 'Provcode',
            'distcode' => 'Distcode',
            'subdistcode' => 'Subdistcode',
            'kpi_a_value_10' => 'Kpi A Value 10',
            'kpi_b_value_10' => 'Kpi B Value 10',
            'kpi_c_value_10' => 'Kpi C Value 10',
            'kpi_d_value_10' => 'Kpi D Value 10',
            'kpi_e_value_10' => 'Kpi E Value 10',
            'kpi_f_value_10' => 'Kpi F Value 10',
            'kpi_a_value_11' => 'Kpi A Value 11',
            'kpi_b_value_11' => 'Kpi B Value 11',
            'kpi_c_value_11' => 'Kpi C Value 11',
            'kpi_d_value_11' => 'Kpi D Value 11',
            'kpi_e_value_11' => 'Kpi E Value 11',
            'kpi_f_value_11' => 'Kpi F Value 11',
            'kpi_a_value_12' => 'Kpi A Value 12',
            'kpi_b_value_12' => 'Kpi B Value 12',
            'kpi_c_value_12' => 'Kpi C Value 12',
            'kpi_d_value_12' => 'Kpi D Value 12',
            'kpi_e_value_12' => 'Kpi E Value 12',
            'kpi_f_value_12' => 'Kpi F Value 12',
            'kpi_a_value_1' => 'Kpi A Value 1',
            'kpi_b_value_1' => 'Kpi B Value 1',
            'kpi_c_value_1' => 'Kpi C Value 1',
            'kpi_d_value_1' => 'Kpi D Value 1',
            'kpi_e_value_1' => 'Kpi E Value 1',
            'kpi_f_value_1' => 'Kpi F Value 1',
            'kpi_a_value_2' => 'Kpi A Value 2',
            'kpi_b_value_2' => 'Kpi B Value 2',
            'kpi_c_value_2' => 'Kpi C Value 2',
            'kpi_d_value_2' => 'Kpi D Value 2',
            'kpi_e_value_2' => 'Kpi E Value 2',
            'kpi_f_value_2' => 'Kpi F Value 2',
            'kpi_a_value_3' => 'Kpi A Value 3',
            'kpi_b_value_3' => 'Kpi B Value 3',
            'kpi_c_value_3' => 'Kpi C Value 3',
            'kpi_d_value_3' => 'Kpi D Value 3',
            'kpi_e_value_3' => 'Kpi E Value 3',
            'kpi_f_value_3' => 'Kpi F Value 3',
            'kpi_a_value_4' => 'Kpi A Value 4',
            'kpi_b_value_4' => 'Kpi B Value 4',
            'kpi_c_value_4' => 'Kpi C Value 4',
            'kpi_d_value_4' => 'Kpi D Value 4',
            'kpi_e_value_4' => 'Kpi E Value 4',
            'kpi_f_value_4' => 'Kpi F Value 4',
            'kpi_a_value_5' => 'Kpi A Value 5',
            'kpi_b_value_5' => 'Kpi B Value 5',
            'kpi_c_value_5' => 'Kpi C Value 5',
            'kpi_d_value_5' => 'Kpi D Value 5',
            'kpi_e_value_5' => 'Kpi E Value 5',
            'kpi_f_value_5' => 'Kpi F Value 5',
            'kpi_a_value_6' => 'Kpi A Value 6',
            'kpi_b_value_6' => 'Kpi B Value 6',
            'kpi_c_value_6' => 'Kpi C Value 6',
            'kpi_d_value_6' => 'Kpi D Value 6',
            'kpi_e_value_6' => 'Kpi E Value 6',
            'kpi_f_value_6' => 'Kpi F Value 6',
            'kpi_a_value_7' => 'Kpi A Value 7',
            'kpi_b_value_7' => 'Kpi B Value 7',
            'kpi_c_value_7' => 'Kpi C Value 7',
            'kpi_d_value_7' => 'Kpi D Value 7',
            'kpi_e_value_7' => 'Kpi E Value 7',
            'kpi_f_value_7' => 'Kpi F Value 7',
            'kpi_a_value_8' => 'Kpi A Value 8',
            'kpi_b_value_8' => 'Kpi B Value 8',
            'kpi_c_value_8' => 'Kpi C Value 8',
            'kpi_d_value_8' => 'Kpi D Value 8',
            'kpi_e_value_8' => 'Kpi E Value 8',
            'kpi_f_value_8' => 'Kpi F Value 8',
            'kpi_a_value_9' => 'Kpi A Value 9',
            'kpi_b_value_9' => 'Kpi B Value 9',
            'kpi_c_value_9' => 'Kpi C Value 9',
            'kpi_d_value_9' => 'Kpi D Value 9',
            'kpi_e_value_9' => 'Kpi E Value 9',
            'kpi_f_value_9' => 'Kpi F Value 9',
            'reporter_id' => 'Reporter ID',
            'note' => 'Note',
            'last_update' => 'Last Update',
        ];
    }
}
