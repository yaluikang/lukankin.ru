<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class UserRecord extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName ()
    {
        return 'user';
    }

    public function setTestUser()
    {
        $this->name = "John";
        $this->email = "lukankin.aleksandr@mail.ru";
        $this->passhash = "TEST";
        $this->status = 2;
    }

    public function setUserJoinForm($userJoinForm)
    {
        $this->name = $userJoinForm->name;
        $this->email = $userJoinForm->email;
        $this->setPassword($userJoinForm->password);
        $this->status = 1;
    }

    public static function existsEmail($email)
    {
        $count = static::find()->where(['email' => $email])->count();
        return $count > 0;
    }

    public static function findUserByEmail($email)
    {
        return static::find()->where(['email' => $email])->one();
    }

    public function setPassword($password)
    {
        $this->passhash = Yii::$app->security->generatePasswordHash($password);
        $this->authokey = Yii::$app->security->generateRandomString(100);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->passhash);
    }

    public static function getImage()
    {
        $id = \Yii::$app->user->id;
        $customer = static::find()
            ->where(['id' => $id])
            ->one();
        $image = $customer->image_name;
        return $image;
    }
    public static function setImage( $str )
    {
        $id = \Yii::$app->user->id;
        return static::updateAll(['image_name' => $str], ['like', 'id', $id]);
    }
}
