<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_package".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $office_package
 * @property integer $employee_package
 * @property string $created_date
 * @property string $exprie_date
 */
class CustomerPackage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'user_id', 'office_package', 'employee_package'], 'integer'],
            [['created_date', 'exprie_date'], 'safe']
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
            'office_package' => 'Office Package',
            'employee_package' => 'Employee Package',
            'created_date' => 'Created Date',
            'exprie_date' => 'Exprie Date',
        ];
    }
}
