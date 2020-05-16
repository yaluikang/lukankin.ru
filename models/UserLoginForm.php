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

    public function login()
    {
        if($this->hasErrors())
            return;
        $userRecord = UserRecord::findUserByEmail($this->email);
        $userIdentity = UserIdentity::findIdentity($userRecord->id);
        Yii::$app->user->login($userIdentity);
    }
}