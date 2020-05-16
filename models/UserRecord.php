<?php

namespace app\models;
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
}
