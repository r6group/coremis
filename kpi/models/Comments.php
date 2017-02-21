<?php

namespace kpi\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $content_id
 * @property string $comment
 * @property string $comment_date
 * @property string $comment_last_update
 * @property integer $user_id
 * @property string $user_name
 */
class Comments extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }


    public function beforeSave($insert)
    {
        $this->comment_date = date("Y-m-d H:i:s");

        if (!Yii::$app->user->isGuest) {
            $this->user_id = Yii::$app->user->identity->getId();
            $this->user_name = Yii::$app->user->identity->f_name . ' ' . Yii::$app->user->identity->l_name;
        }

        return parent::beforeSave($insert);
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
        $captcha = 'string';

        if (Yii::$app->user->isGuest) {
            $captcha = 'captcha';
        }

        return [
            [['content_id', 'comment'], 'required'],
            [['content_id', 'user_id'], 'integer'],
            [['comment'], 'string'],
            [['comment_date', 'comment_last_update'], 'safe'],
            [['user_name'], 'string', 'max' => 255],
            ['verifyCode', $captcha]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content_id' => 'Content ID',
            'comment' => 'Comment',
            'comment_date' => 'Comment Date',
            'comment_last_update' => 'Comment Last Update',
            'user_id' => 'User ID',
            'user_name' => 'ชื่อ',
        ];
    }
}
