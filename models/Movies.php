<?php


namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Movies_has_genre;

class Movies extends ActiveRecord
{
    public function getMoviesHasGenre()
    {
        return $this->hasMany(Movies_has_genre::className(), ['movies_id' => 'movies_id']);
    }
}