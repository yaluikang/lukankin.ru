<?php

namespace app\models;

use yii\db\Query;

class Sqlquery extends Query
{
    private $pageNumber = 1;
    private $numOfMovies = 9;
    public function getMovies()
    {
        //$sql = $this->select(["movies_id, movies_name, movies_url_poster, movies_date, GROUP_CONCAT(genres_name SEPARATOR ', ') AS `genres_name` FROM (SELECT movies.movies_id, movies_name, genres_name, movies_url_poster, movies_date FROM movies JOIN movies_has_genre ON `movies`.`movies_id`=`movies_has_genre`.`movies_id` JOIN genres ON `movies_has_genre`.`movies_genre`=`genres`.`genres_id` WHERE `movies_qualifier`=1 AND movies.movies_id= ANY(SELECT movies.movies_id FROM movies JOIN movies_has_genre ON `movies`.`movies_id`=`movies_has_genre`.`movies_id` JOIN genres ON `movies_has_genre`.`movies_genre`=`genres`.`genres_id` WHERE `movies_qualifier`=1)) AS `table`"])->groupBy('movies_id')->limit(9)->all();
        //$sql = $this->createCommand();
        $borders = $this->getBorders();
        $sql = $this->select("movies_id, movies_name, movies_url_poster, movies_date")->FROM("movies")->offset($borders['offset'])->limit($borders['limit'])->all();
        return json_encode($sql,JSON_UNESCAPED_UNICODE);
    }
    public function getIdOfMovies()
    {

    }
    public function pagination()
    {
        //Увеличить $pageNumber
        //Задать новые лимит и оффсет для функции getMovies
        //Вызвать эту функцию с новыми лимитом и оффсетом
        $this->increasePageNumber();
        $this->getMovies($this->getBorders());
    }
    public function getBorders()
    {
        $numOfMovies = $this->numOfMovies;
        $pageNumber = $this->pageNumber;
        $numInclude = 1;
        $borderArray = array( 'limit' => $numOfMovies, 'offset' => 1 );
        if( $pageNumber - $numInclude != 0 )
        {
            $numInclude = $numOfMovies * ( $pageNumber - $numInclude );
            $borderArray['limit'] += $numInclude;
            $borderArray['offset'] += $numInclude;
        }
        return $borderArray;
    }
    public function increasePageNumber()
    {
        $this->pageNumber++;
    }
    public function increaseNumOfMovies($num)
    {
        $this->numOfMovies = $num;
    }
}