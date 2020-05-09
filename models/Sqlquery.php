<?php

namespace app\models;

use yii\db\Query;

class Sqlquery extends Query
{
    private $pageNumber = 1;
    private $numOfMovies = 9;
    private $moviesQualifier = 1;

    public function getMovies( $q )
    {
        $this->setMoviesQualifier( $q );
        $borders = $this->getBorders();
        $movies = $this->select("movies_id, movies_name, movies_url_poster, movies_date")->FROM("movies")->where(['movies_qualifier' => $this->moviesQualifier])->offset( $borders['offset'] )->limit( $borders['limit'] )->all();
        $moviesWithGenres = $this->addGenresForMovies($movies);
        echo json_encode( $borders,JSON_UNESCAPED_UNICODE );
    }

    public function findMoviesByGenre( $genre, $q )
    {
        $this->setMoviesQualifier( $q );
        $borders = $this->getBorders();
        $movies = $this->select("movies_id")->FROM('movies_has_genre')->join('JOIN', 'genres', 'movies_has_genre.movies_genre=genres.genres_id')->where(['genres_name' => $genre, ])->offset( $borders['offset'] )->limit( $borders['limit'] )->all();
        $ids = $this->getIdOfMovies( $movies );
        $this->join = null;
        $movies = $this->select("movies_id, movies_name, movies_url_poster, movies_date")->FROM("movies")->where(['movies_qualifier' => $this->moviesQualifier])->offset( $borders['offset'] )->andWhere(['movies_id' => $ids ])->createCommand()->sql;
        //$moviesWithGenres = $this->addGenresForMovies($movies);
        echo json_encode( $movies,JSON_UNESCAPED_UNICODE );
    }

    public function getContentForMovie( $id )
    {
        $contentOfMovie = $this->select('*')->FROM('movies')->where(['movies_id' => $id])->all();
        $contentOfMovie = $this->addGenresForMovies( $contentOfMovie );
        return $contentOfMovie;
    }

    public function addGenresForMovies( $movies )
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

    public function getIdOfMovies( $movies )
    {
        $arrayIdOfMovies = [];
        for( $i = 0; $i < count($movies); $i++ )
        {
            array_push( $arrayIdOfMovies, $movies[$i]['movies_id'] );
        }
        return $arrayIdOfMovies;
    }

    public function setMoviesQualifier( $q )
    {
        $this->moviesQualifier = $q;
    }

    public function pagination( $p, $q, $genre )
    {
        //Увеличить $pageNumber
        //Задать новые лимит и оффсет для функции getMovies
        //Вызвать эту функцию с новыми лимитом и оффсетом
        $this->setPageNumber( $p );
        if( $genre == null ){
            $this->getMovies( $q );
        } else {
            $this->findMoviesByGenre( $genre, $q );
        }

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

    public function increaseNumOfMovies( $num )
    {
        $this->numOfMovies = $num;
    }
}