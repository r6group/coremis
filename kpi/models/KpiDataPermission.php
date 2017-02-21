<?php

namespace kpi\models;

use Yii;

/**
 * This is the model class for table "kpi_data_permission".
 *
 * @property integer $kpi_id
 * @property integer $user_id
 * @property string $assign_date
 */
class KpiDataPermission extends \yii\db\ActiveRecord
{

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
    public static function tableName()
    {
        return 'kpi_data_permission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_id', 'user_id'], 'required'],
            [['kpi_id', 'user_id', 'assign_by'], 'integer'],
            [['level', 'level_code'], 'string'],
            [['assign_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kpi_id' => 'Kpi ID',
            'user_id' => 'User ID',
            'assign_by' => 'Assign By',
            'assign_date' => 'Assign Date',
        ];
    }
}
