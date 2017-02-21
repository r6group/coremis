<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "scripts".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $cat_id
 * @property string $master_active
 * @property string $master_cron
 * @property string $force_master_cron
 * @property string $create_date
 * @property string $last_update
 * @property string $public
 * @property integer $user_id
 */
class Scripts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scripts';
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
            [['title', 'user_id'], 'required'],
            [['description'], 'string'],
            [['cat_id', 'user_id'], 'integer'],
            [['create_date', 'last_update'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['master_active', 'force_master_cron', 'public'], 'string', 'max' => 1],
            [['master_cron'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'cat_id' => 'Cat ID',
            'master_active' => 'Master Active',
            'master_cron' => 'Master Cron',
            'force_master_cron' => 'Force Master Cron',
            'create_date' => 'Create Date',
            'last_update' => 'Last Update',
            'public' => 'Public',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findById($id)
    {
        return static::findOne(['id' => $id]);
    }
}
