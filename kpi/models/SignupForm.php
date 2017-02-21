<?php
namespace kpi\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $f_name;
    public $l_name;
    public $email;
    public $password;
    public $pin;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            [['name', 'surname', 'username'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'เลขประจำตัวประชาชนนี้ได้ลงทะเบียนไว้แล้ว.'],
            ['username', 'string', 'min' => 13, 'max' => 13],

            [['name', 'surname'], 'string', 'max' => 50],
            [['name', 'surname'], 'match', 'pattern' => Profile::$patternName],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email นี้ได้ลงทะเบียนไว้แล้ว.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->f_name = $this->f_name;
            $user->l_name = $this->l_name;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    public function attributeLabels()
    {
        return [
            'f_name' => 'ชื่อ',
            'l_name' => 'นามสกุล',
            'pin' => 'รหัส PIN',
        ];
    }
}
