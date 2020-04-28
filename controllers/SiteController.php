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
    public function actionGetmovies ( $q )
    {
        $rows = new Sqlquery();
        echo($rows->getMovies( $q ));
    }
    public function actionPagination( $p, $q )
    {
        $row = new Sqlquery();
        echo($row->pagination( $p, $q ));

    }

}
