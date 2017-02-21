<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $title
 * @property boolean $all_day
 * @property string $start
 * @property string $end
 * @property string $url
 * @property string $class_name
 * @property boolean $editable
 * @property string $start_editable
 * @property string $duration_editable
 * @property string $source
 * @property string $color
 * @property string $background_color
 * @property string $border_color
 * @property string $text_color
 * @property integer $user_id
 * @property string $chared_users
 * @property integer $event_cat
 * @property string $remark
 * @property boolean $enable_nortifiled
 * @property string $nortifiled_date
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title'], 'required'],
            [['id', 'user_id', 'event_cat'], 'integer'],
            [['all_day', 'editable', 'enable_nortifiled', 'start_editable', 'duration_editable'], 'boolean'],
            [['start', 'end', 'nortifiled_date'], 'safe'],
            [['chared_users', 'remark'], 'string'],
            [['title', 'url', 'class_name', 'source', 'color', 'background_color', 'border_color', 'text_color'], 'string', 'max' => 255]
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
            'all_day' => 'All Day',
            'start' => 'Start',
            'end' => 'End',
            'url' => 'Url',
            'class_name' => 'Class Name',
            'editable' => 'Editable',
            'start_editable' => 'Start Editable',
            'duration_editable' => 'Duration Editable',
            'source' => 'Source',
            'color' => 'Color',
            'background_color' => 'Background Color',
            'border_color' => 'Border Color',
            'text_color' => 'Text Color',
            'user_id' => 'User ID',
            'chared_users' => 'Chared Users',
            'event_cat' => 'Event Cat',
            'remark' => 'Remark',
            'enable_nortifiled' => 'Enable Nortifiled',
            'nortifiled_date' => 'Nortifiled Date',
        ];
    }
}
