<?php


namespace app\models;


use yii\db\ActiveRecord;
use yii\db\Movies;

class Movies_has_genre extends ActiveRecord
{
    public function getMovies()
    {
        return $this->hasOne(Movies::className(), ['movies_id' => 'movies_id']);
    }

}