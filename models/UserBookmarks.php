<?php


namespace app\models;


use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class UserBookmarks extends ActiveRecord
{

    public static function tableName ()
    {
        return 'user_bookmarks';
    }

    public static function addBookmarksToDb()
    {
        $list = static::find()->select('movie_id')->where(['user_id' => 1])->asArray()->all();
        $list = ArrayHelper::getColumn($list,'movie_id');
        $cookies = \Yii::$app->request->cookies->get('movies');
        echo json_encode( $cookies,JSON_UNESCAPED_UNICODE );
    }

}