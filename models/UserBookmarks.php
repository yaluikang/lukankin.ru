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

    public static function getListOfMovies( $id )
    {
        $list = static::find()->select('movie_id')->where(['user_id' => $id])->asArray()->all();
        $list = ArrayHelper::getColumn($list,'movie_id');
        return $list;
    }

    public static function deleteCookies()
    {
        $cookies = \Yii::$app->request->cookies;
        if(isset($_COOKIE['added']) || isset($_COOKIE['deleted']))
        {
            unset($_COOKIE['added']);
            unset($_COOKIE['deleted']);
        }
    }

    public static function addBookmarksToDb( $id )
    {
        //обработать кукисы deleted и added - убрать возможные совпадения
        //добавить в сесси данные из бд по мувис
        //провести проверку по добавлению или удалению мувис из бд
        //отправить обратно массив закладок
        $session = \Yii::$app->session;
        $list = static::getListOfMovies( $id );
        $added = \Yii::$app->request->cookies->getValue('added', (isset($_COOKIE['added']))? $_COOKIE['added']: 'added');
        $deleted = \Yii::$app->request->cookies->getValue('deleted', (isset($_COOKIE['deleted']))? $_COOKIE['deleted']: 'deleted');
        if( $added != 'added')
        {
            $added = array_unique($added);

        }
        if( $deleted != 'deleted')
        {
            $deleted = array_unique($deleted);

        }
        foreach ( $added as $index => $movie_id)
        {
            if( in_array( $movie_id, $list ))
            {
                static::addMovieToBookmarks( $movie_id, $id );
            }
        }

        foreach ( $deleted as $index => $movie_id)
        {
            if( in_array( $movie_id, $list ))
            {
                static::deleteMovieFromBookmarks( $movie_id, $id );
            }
        }
        static::deleteCookies();
        return static::getListOfMovies( $id );
    }

    public static function deleteMovieFromBookmarks( $movie_id, $id )
    {
        static::deleteAll([
            'user_id' => $id,
            'movie_id' => $movie_id
        ]);
    }

    public static function isInBookmarks( $id, $movie_Id )
    {
        $list = static::getListOfMovies( $id );
        return in_array( $movie_Id, $list );
    }

    public function addMovieToBookmarks( $movie_id, $id )
    {
        $movie = new UserBookmarks();
        $movie->user_id = $id;
        $movie->movie_id = $movie_id;
        $movie->save();
    }
}