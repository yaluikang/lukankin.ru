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
        $cookies = \Yii::$app->request->cookies->getValue('movies', (isset($_COOKIE['movies']))? $_COOKIE['movies']: 'movies');
        $cookies = json_decode($cookies,true);
        //Если муви из кукис есть и он равен false и такой id фильма есть в бд - удалить из бд
        //если муви из кукис есть и он равен false и такого id муви не тв бд - ничего не делать
        //если муви из кукис есть и он равен true и такой id есть в бд - ничего не делать
        //если муви из кукис есть и он равен true и такого id нет в бд - забить его в бд
        foreach ( $cookies as $movie_id => $boolean)
        {
            if( $cookies[$movie_id] == false && array_search( $movie_id, $list ))
            {
                echo $movie_id . ' - Удалить из бд.'. array_search( $movie_id, $list );
            } elseif ( $cookies[$movie_id] == false && !array_search( $movie_id, $list ))
            {
                echo $movie_id . ' - Ничего не делать.'. array_search( $movie_id, $list );
            } elseif ( $cookies[$movie_id] == true && array_search( $movie_id, $list ))
            {
                echo $movie_id . ' - Ничего не делать.'. array_search( $movie_id, $list );
            } elseif ( $cookies[$movie_id] == true && !array_search( $movie_id, $list ))
            {
                echo $movie_id . ' - Забить в бд.'. array_search( $movie_id, $list );
            }
        }
        //echo count($cookies);
    }

}