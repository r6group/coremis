<?php

namespace app\modules\hrm\models;

use Yii;

/**
 * This is the model class for table "health_items".
 *
 * @property integer $id
 * @property string $off_id
 * @property string $item_code
 * @property string $item_status
 */
class HealthItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'health_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['off_id', 'item_code', 'total'], 'required'],
            [['off_id'], 'string', 'max' => 5],
            [['item_code'], 'string', 'max' => 9],
            [['item_status'], 'string', 'max' => 255],
            [['total'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'off_id' => 'สถานบริการ',
            'item_code' => 'ประเภท',
            'item_status' => 'สถานะ',
            'total' => 'จำนวน',
        ];
    }
}
