<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "km_items".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property string $title
 * @property string $detail
 * @property integer $user_id
 * @property string $tags
 * @property string $create_date
 * @property string $update_date
 */
class KmItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'km_items';
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
            [['cat_id', 'user_id'], 'integer'],
            [['detail'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['title', 'tags'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'title' => 'Title',
            'detail' => 'Detail',
            'user_id' => 'User ID',
            'tags' => 'Tags',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
        ];
    }
}
