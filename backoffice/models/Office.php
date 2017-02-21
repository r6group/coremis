<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "office".
 *
 * @property integer $id
 * @property string $office_id
 * @property string $office_name
 * @property integer $parent_id
 * @property integer $package_id
 * @property integer $creater_id
 * @property string $created_date
 * @property string $last_update
 * @property string $remark
 */
class Office extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'package_id', 'creater_id'], 'required'],
            [['id', 'parent_id', 'package_id', 'creater_id'], 'integer'],
            [['created_date', 'last_update'], 'safe'],
            [['remark'], 'string'],
            [['office_id'], 'string', 'max' => 200],
            [['office_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'office_id' => 'Office ID',
            'office_name' => 'Office Name',
            'parent_id' => 'Parent ID',
            'package_id' => 'Package ID',
            'creater_id' => 'Creater ID',
            'created_date' => 'Created Date',
            'last_update' => 'Last Update',
            'remark' => 'Remark',
        ];
    }
}
