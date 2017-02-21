<?php
namespace common\models;

use common\models\User;
use yii\base\Model;
use Yii;
use common\models\Profile;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $id;
    public $name;
    public $surname;
    public $username;
    public $email;
    public $off_id;
    public $password;
    public $auth_key;
    public $main_pst;

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

            [['name', 'surname', 'main_pst'], 'string', 'max' => 50],
            [['name', 'surname'], 'match', 'pattern' => Profile::$patternName],

            ['email', 'filter', 'filter' => 'trim'],
            [['off_id', 'email'], 'required'],
            ['email', 'email'],
            ['off_id', 'string', 'max' => 5, 'min' => 5],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email นี้ได้ลงทะเบียนไว้แล้ว.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'ชื่อ',
            'surname' => 'นามสกุล',
            'email' => 'Email',
            'username' => 'เลขประจำตัวประชาชน',
            'off_id' => 'หน่วยงาน',
            'main_pst' => 'ตำแหน่ง',
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
            $user->username = $this->username;
            $user->email = $this->email;
            $user->f_name = $this->name;
            $user->l_name = $this->surname;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->status = User::STATUS_NEW;
            if ($user->save()) {
                $this->id = $user->id;
                $this->auth_key = $user->auth_key;
                $profile = new Profile();
                $profile->user_id = $user->id;
                $profile->name = $this->name;
                $profile->surname = $this->surname;
                $profile->cid = $this->username;
                $profile->email = $this->email;
                $profile->off_id = $this->off_id;
                $profile->main_pst = $this->main_pst;



                //если в куках есть id аффилиата, сохраняем его
//                $affiliateId = (int) Yii::$app->request->cookies['affiliate'];
//                if ($affiliateId > 0 && User::findIdentity($affiliateId)) {
//                    $profile->user_affiliate_id = $affiliateId;
//                }

                $profile->save();



                //if ($profile->save()) {

                    $auth = Yii::$app->authManager;
                    $authorRole = $auth->getRole('user');
                    $auth->assign($authorRole, $user->id);
               // }

                return $this->sendRegistrationEmail();
            }
        }

        return null;
    }

    public function sendRegistrationEmail()
    {
        $layouts = ['html' => 'registration-html', 'text' => 'registration-text'];
        $params = [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'auth_key'=> $this->auth_key,
            'email' => $this->email,
        ];

            return Yii::$app->mailer->compose($layouts, $params)
                ->setFrom([\Yii::$app->params['supportEmail'] => Yii::$app->config->get('CONTACT.ORGANIZATION_NAME')])
                ->setTo($this->email)
                ->setSubject(\Yii::$app->name . ' :: ยืนยันการลงทะเบียน')
                ->send();
    }
}
