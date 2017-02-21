<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_titles".
 *
 * @property string $title_Code
 * @property string $title_Desc
 */
class CTitles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_titles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_Code'], 'string', 'max' => 3],
            [['title_Desc'], 'string', 'max' => 20],
            [['title_Code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title_Code' => 'Title  Code',
            'title_Desc' => 'Title  Desc',
        ];
    }
}
