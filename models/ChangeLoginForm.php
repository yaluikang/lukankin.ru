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

    public function changeLogin()
    {
        if ($this->hasErrors())
            return;
        $id = \Yii::$app->user->id;
        $customer = static::find()
            ->where(['id' => $id])
            ->one();
        /*$customer->name = $this->login;
        $customer->save();*/
        return $customer->name;
    }
}