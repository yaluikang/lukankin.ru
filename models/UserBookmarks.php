<?php


namespace app\models;


use yii\db\ActiveRecord;

class UserBookmarks extends ActiveRecord
{

    public static function tableName ()
    {
        return 'user_bookmarks';
    }



}