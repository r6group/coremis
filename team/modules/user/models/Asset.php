<?php

namespace team\modules\user\models;

use Yii;

/**
 * This is the model class for table "asset".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $image
 * @property string $name
 * @property string $type
 * @property string $size
 * @property string $upload_date
 * @property string $last_update
 */
class Asset extends \yii\db\ActiveRecord
{

    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['file'], 'file'],
            [['upload_date', 'last_update'], 'safe'],
            [['image', 'name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 120],
            [['size'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'image' => 'Image',
            'name' => 'Name',
            'type' => 'Type',
            'size' => 'Size',
            'upload_date' => 'Upload Date',
            'last_update' => 'Last Update',
        ];
    }
}
