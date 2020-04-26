<?php

namespace app\models;

use yii\db\Query;

class Sqlquery extends Query
{
    private $pageNumber = 1;
    private $numOfMovies = 9;


    public function getMovies()
    {
        $borders = $this->getBorders();
        $movies = $this->select("movies_id, movies_name, movies_url_poster, movies_date")->FROM("movies")->offset( $borders['offset'] )->limit( $borders['limit'] )->all();
        $moviesWithGenres = $this->addGenresForMovies($movies);
        echo json_encode( $moviesWithGenres,JSON_UNESCAPED_UNICODE );
    }
    public function addGenresForMovies($movies)
    {
        //Вызвать функцию getIdOfMovies для составления запроса в базу данных по id
        //цикл для инъекции жанров в массив $movies
        $ids = $this->getIdOfMovies( $movies );
        $this->limit = null;
        $this->offset = null;
        $genresOfMovies = $this->select('movies_id, genres_name' )->FROM('movies_has_genre' )->join('JOIN', 'genres', 'movies_has_genre.movies_genre=genres.genres_id' )->where(['movies_id' => $ids ])->all();
        for( $i = 0; $i < count( $movies ); $i++ )
        {
            $movies[$i]['genres_name'] = [];
            for( $j = 0; $j < count( $genresOfMovies ); $j++)
            {
                if( $movies[$i]['movies_id'] == $genresOfMovies[$j]['movies_id'] )
                {
                    array_push( $movies[$i]['genres_name'], $genresOfMovies[$j]['genres_name']);
                }
            }
        }
        return $movies;
    }
    public function getIdOfMovies($movies)
    {
        $arrayIdOfMovies = [];
        for( $i = 0; $i < count($movies); $i++ )
        {
            array_push( $arrayIdOfMovies, $movies[$i]['movies_id'] );
        }
        return $arrayIdOfMovies;
    }
    public function pagination( $p )
    {
        //Увеличить $pageNumber
        //Задать новые лимит и оффсет для функции getMovies
        //Вызвать эту функцию с новыми лимитом и оффсетом
        $this->setPageNumber( $p );
        $this->getMovies();
    }
    public function getBorders()
    {
        $numOfMovies = $this->numOfMovies;
        $pageNumber = $this->pageNumber;
        $numInclude = 1;
        $borderArray = array( 'limit' => $numOfMovies, 'offset' => 0 );
        if( $pageNumber - $numInclude != 0 )
        {
            $numInclude = $numOfMovies * ( $pageNumber - $numInclude );
            $borderArray['offset'] += $numInclude;
        }
        return $borderArray;
    }
    public function setPageNumber( $p )
    {
        $this->pageNumber = $p;
    }
    public function increaseNumOfMovies($num)
    {
        $this->numOfMovies = $num;
    }
}