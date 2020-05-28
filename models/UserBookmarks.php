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
        $list = static::find()->select('movie_id')->where(['user_id' => 1])->asArray()->all();
        echo json_encode( $list,JSON_UNESCAPED_UNICODE );
    }

}