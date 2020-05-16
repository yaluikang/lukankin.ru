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
            ['password2', 'required'],
            ['name', 'string', 'min' => 3, 'max' => 30],
            ['email', 'email'],
            ['password', 'string', 'min' => 6],
            ['password2', 'compare', 'compareAttribute' => 'password']/*,
            ['email', 'errorIfEmailUsed']*/
        ];
    }

    public function errorIfEmailUsed()
    {
        //$this->addError('email', 'Email занят');
    }
}