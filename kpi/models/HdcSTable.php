<?php

namespace kpi\models;

use Yii;

/**
 * This is the model class for table "hdc_s_table".
 *
 * @property integer $id
 * @property string $table_name
 * @property integer $kpi_id
 * @property string $sql
 * @property string $hdc_url
 * @property string $last_update
 * @property string $status
 * @property string $log
 */
class HdcSTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hdc_s_table';
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
            [['table_name', 'kpi_id'], 'required'],
            [['kpi_id'], 'integer'],
            [['sql', 'log', 'hdc_url'], 'string'],
            [['last_update'], 'safe'],
            [['table_name', 'status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table_name' => 'Table Name',
            'kpi_id' => 'Kpi ID',
            'sql' => 'Sql',
            'hdc_url' => 'HDC Url',
            'last_update' => 'Last Update',
            'status' => 'Status',
            'log' => 'Log',
        ];
    }
}
