<?php


namespace app\models;


use yii\base\Model;

class UserJoinForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $password2;

    public function rules()
    {
        return [
            ['name', 'required'],
            ['email', 'required'],
            ['password', 'required'],
            ['password2', 'required']
        ];
    }
}