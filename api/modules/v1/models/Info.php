<?php 


namespace app\modules\v1\models;

use Yii;
use yii\base\model;

/**
 *
 */
class Info extends Model
{
    public $sex;
    public $age;
    public $provcode;
    public $distcode;
    public $subdistcode;
    public $hoscode;
    public $msg;


    public function rules()
    {
        return [
            ['sex', 'required'],
            ['age', 'number'],
            ['provcode', 'string'],
            ['distcode', 'string'],
            ['subdistcode', 'string'],
            ['hoscode', 'string'],
            ['msg', 'required'],

        ];
    }

    public function find()
    {
        return null;
    }


}



?>