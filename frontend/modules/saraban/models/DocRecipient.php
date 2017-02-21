<?php

namespace app\modules\saraban\models;

use Yii;

/**
 * This is the model class for table "doc_recipient".
 *
 * @property integer $id
 * @property integer $doc_id
 * @property integer $to
 * @property string $from
 * @property integer $received_no
 * @property integer $received_by
 * @property string $received_date
 * @property string $status
 */
class DocRecipient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doc_recipient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['to', 'doc_id', 'received_no', 'received_by'], 'integer'],
            [['received_date'], 'safe'],
            [['from'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_id' => 'Ref',
            'to' => 'ถึง',
            'from' => 'จาก',
            'received_no' => 'เลขลงรับ',
            'received_by' => 'ลงรับโดย',
            'received_date' => 'วันที่ลงรับ',
            'status' => 'สถานะ',
        ];
    }
}
