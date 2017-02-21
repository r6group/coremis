<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contributors".
 *
 * @property integer $id
 * @property integer $script_id
 * @property integer $user_id
 * @property string $join_date
 */
class Contributors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contributors';
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
            [['script_id', 'user_id'], 'required'],
            [['script_id', 'user_id'], 'integer'],
            [['join_date'], 'safe'],
            [['script_id', 'user_id'], 'unique', 'targetAttribute' => ['script_id', 'user_id'], 'message' => 'The combination of Script ID and User ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'script_id' => 'Script ID',
            'user_id' => 'User ID',
            'join_date' => 'Join Date',
        ];
    }
}
