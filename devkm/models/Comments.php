<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $km_id
 * @property string $msg
 * @property integer $user_id
 * @property string $create_date
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_devkm');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['km_id', 'user_id'], 'integer'],
            [['msg'], 'string'],
            [['create_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'km_id' => 'Km ID',
            'msg' => 'Msg',
            'user_id' => 'User ID',
            'create_date' => 'Create Date',
        ];
    }
}
