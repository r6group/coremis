<?php
namespace app\models;

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
            ['f_name', 'required'],
            ['l_name', 'required'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['pin', 'string', 'min' => 4, 'max' => 4],
            ['pin', 'required'],
            [['pin'], function ($attribute, $params) {
                if(($this->pin != "9753")){
                    $this->addError('pin','รหัส PIN ไม่ถูกต้อง!');
                }
            }],

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
