<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "script_details".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $table_name
 * @property string $title
 * @property string $description
 * @property string $script
 * @property string $script_cron
 * @property string $force_script_cron
 * @property string $active
 * @property string $client_office_type
 * @property string $create_date
 * @property string $last_update
 */
class ScriptDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'script_details';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_healthscript');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['description', 'script'], 'string'],
            [['create_date', 'last_update'], 'safe'],
            [['table_name'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 255],
            [['script_cron'], 'string', 'max' => 60],
            [['force_script_cron', 'active'], 'string', 'max' => 1],
            [['client_office_type'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'table_name' => 'Table Name',
            'title' => 'Title',
            'description' => 'Description',
            'script' => 'Script',
            'script_cron' => 'Script Cron',
            'force_script_cron' => 'Force Script Cron',
            'active' => 'Active',
            'client_office_type' => 'Client Office Type',
            'create_date' => 'Create Date',
            'last_update' => 'Last Update',
        ];
    }
}
