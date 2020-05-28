<?php


namespace app\models;


use yii\db\ActiveRecord;

class UserBookmarks extends ActiveRecord
{

    public static function tableName ()
    {
        return 'user_bookmarks';
    }

    public static function addBookmarksToDb()
    {
        $list = static::find()->asArray()->all();
        echo json_encode( $list,JSON_UNESCAPED_UNICODE );
    }

}