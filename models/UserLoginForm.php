<?php


namespace app\models;


use Yii;
use yii\base\Model;

class UserLoginForm extends Model
{
    public $email;
    public $password;

    private $userRecord;

    public function rules()
    {
        return [
            ['email', 'required'],
            ['password', 'required'],
            ['email','email'],
            ['email', 'errorIfEmailNotFound'],
            ['password', 'errorIfPasswordWrong']
        ];
    }

    public function errorIfEmailNotFound()
    {
        $this->userRecord = UserRecord::findUserByEmail($this->email);
        if($this->userRecord == null)
        {
            $this->addError('email', 'This e-mail does not registered');
        }
    }

    public function errorIfPasswordWrong()
    {
        if ($this->hasErrors())
            return;
        $this->userRecord = UserRecord::findUserByEmail($this->email);
        if ($this->userRecord->passhash != $this->password)
            $this->addError('password', 'Wrong password');
    }

    public function login()
    {
        if($this->hasErrors())
            return;
        $userRecord = UserRecord::findUserByEmail($this->email);
        $userIdentity = UserIdentity::findIdentity($userRecord->id);
        Yii::$app->user->login($userIdentity);
    }
}