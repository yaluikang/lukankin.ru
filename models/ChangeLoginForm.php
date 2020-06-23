<?php


namespace app\models;


use yii\base\Model;

class ChangeLoginForm extends UserRecord
{
    public $login;

    public function rules()
    {
        return [
            ['login', 'required'],
            ['login', 'string', 'min' => 3, 'max' => 30]
        ];
    }

    public function setNewLogin()
    {
        if ($this->hasErrors())
            return;
        UserRecord::changeLogin( $this->login );
    }
}