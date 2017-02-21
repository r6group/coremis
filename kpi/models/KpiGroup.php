<?php

namespace kpi\models;

use Yii;

/**
 * This is the model class for table "kpi_group".
 *
 * @property integer $id
 * @property string $title
 * @property string $note
 * @property string $tags
 * @property integer $sort_order
 * @property string $featured
 * @property string $published
 * @property string $create_date
 * @property integer $user_id
 */
class KpiGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_group';
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
            [['title'], 'required'],
            [['note'], 'string'],
            [['sort_order', 'user_id'], 'integer'],
            [['create_date'], 'safe'],
            [['title', 'tags'], 'string', 'max' => 255],
            [['featured', 'published'], 'string', 'max' => 1]
        ];
    }

    public function beforeSave($insert) {


        if ($insert == true) {

            $this->create_date = date('Y-m-d h:i:sa');
            $this->user_id = \Yii::$app->user->identity->getId();
            return true;
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'note' => 'Note',
            'tags' => 'Tags',
            'sort_order' => 'Sort Order',
            'featured' => 'Featured',
            'published' => 'เผยแพร่',
            'create_date' => 'Create Date',
            'user_id' => 'User ID',
        ];
    }
}
