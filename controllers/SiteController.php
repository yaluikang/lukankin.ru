<?php

namespace app\controllers;


use app\models\Movies;
use app\models\Movies_has_genre;
use yii\web\Controller;
use app\models\Sqlquery;

class SiteController extends Controller
{
    public function actionIndex ()
    {
        return $this->render('index');
    }
    public function actionFilms ()
    {
        echo 'films';
        //return $this->render('index');
    }
    public function actionTvseries ()
    {
        echo 'tvseries';
        //return $this->render('index');
    }
    public function actionNewItems ()
    {
        echo 'TEST123';
        //return $this->render('index');
    }
    public function actionTest (/*$movie, array $limit*/)
    {
        $rows = new Sqlquery();
        echo($rows->getMovies());
    }
    public function actionPagination()
    {
        $row = new Sqlquery();
        echo($row->pagination());
    }
}
