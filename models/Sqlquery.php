<?php

namespace app\models;

use yii\db\Query;

class Sqlquery extends Query
{
    public function getMovies()
    {
        $sql = $this->select(['movies_id','movies_name', 'movies_url_poster', 'movies_date', "GROUP_CONCAT(genres_name SEPARATOR \', \') AS `genres_name` FROM (SELECT movies.movies_id, movies_name, genres_name, movies_url_poster, movies_date FROM movies JOIN movies_has_genre ON `movies`.`movies_id`=`movies_has_genre`.`movies_id` JOIN genres ON `movies_has_genre`.`movies_genre`=`genres`.`genres_id` WHERE `movies_qualifier`=$category AND movies.movies_id= ANY(SELECT movies.movies_id FROM movies JOIN movies_has_genre ON `movies`.`movies_id`=`movies_has_genre`.`movies_id` JOIN genres ON `movies_has_genre`.`movies_genre`=`genres`.`genres_id` WHERE `movies_qualifier`=$category)) AS `table`"])->groupBy('movies_id')->limit(9)->all();
        return json_encode($sql,JSON_UNESCAPED_UNICODE);
    }
}