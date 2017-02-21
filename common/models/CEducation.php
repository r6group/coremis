<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_education".
 *
 * @property integer $id
 * @property string $education
 */
class CEducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['education'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'education' => 'Education',
        ];
    }
}
