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
        if(isset($_COOKIE['movies']))
        {
            unset($_COOKIE['movies']);
        } elseif( ($cookies->get('movies')) !== null)
        {
            $cookies->remove('movies');
        }
    }

    /*public static function addNewCookies( $id )
    {
        $list = static::getListOfMovies( $id );
        $obj = [];
        for( $i = 0; $i < count( $list ); $i++ )
        {
            $obj[$list[0]] = true;
        }
        $obj = json_encode($obj, JSON_FORCE_OBJECT);
        $cookies = \Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => 'movies',
            'value' => $obj,
            'expire' => time() + 86400 * 30
        ]));
    }*/

    public static function addBookmarksToDb( $id )
    {
        $list = static::getListOfMovies( $id );
        $cookies = \Yii::$app->request->cookies->getValue('movies', (isset($_COOKIE['movies']))? $_COOKIE['movies']: 'movies');
        $cookies = json_decode($cookies,true);
        if( $cookies == 'movies' )
        {
            echo '123';
        } else {
            echo $cookies;
        }
        //Если муви из кукис есть и он равен false и такой id фильма есть в бд - удалить из бд
        //если муви из кукис есть и он равен false и такого id муви не тв бд - ничего не делать
        //если муви из кукис есть и он равен true и такой id есть в бд - ничего не делать
        //если муви из кукис есть и он равен true и такого id нет в бд - забить его в бд
        /*foreach ( $cookies as $movie_id => $boolean)
        {
            if( $cookies[$movie_id] == false && in_array( $movie_id, $list ))
            {
                echo $movie_id . ' - Удалить из бд.'. in_array( $movie_id, $list );
                $result = static::deleteMovieFromBookmarks( $movie_id, $id );
                echo $result;


            } elseif ( $cookies[$movie_id] == false && !in_array( $movie_id, $list ))
            {
                echo $movie_id . ' - Ничего не делать.'. in_array( $movie_id, $list );


            } elseif ( $cookies[$movie_id] == true && in_array( $movie_id, $list ))
            {
                echo $movie_id . ' - Ничего не делать.'. in_array( $movie_id, $list );


            } elseif ( $cookies[$movie_id] == true && !in_array( $movie_id, $list ))
            {
                echo $movie_id . ' - Забить в бд.'. in_array( $movie_id, $list );
                static::addMovieToBookmarks( $movie_id, $id );


            }
        }
        static::deleteCookies();*/
        //echo $cookies = \Yii::$app->request->cookies->getValue('movies', (isset($_COOKIE['movies']))? $_COOKIE['movies']: 'movies');
    }

    public static function deleteMovieFromBookmarks( $movie_id, $id )
    {
        static::deleteAll([
            'user_id' => $id,
            'movie_id' => $movie_id
        ]);
    }

    public static function isInBookmarks( $id )
    {

    }

    public function addMovieToBookmarks( $movie_id, $id )
    {
        $movie = new UserBookmarks();
        $movie->user_id = $id;
        $movie->movie_id = $movie_id;
        $movie->save();
    }
}