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
    public function actionMovie ( $id )
    {
        $contentForMovie = new Sqlquery();
        $contentForMovie = $contentForMovie->getContentForMovie( $id );
        echo json_encode( $contentForMovie,JSON_UNESCAPED_UNICODE );
        //return $this->render('movie.php', [ 'contentForMovie' => $contentForMovie ]);
    }
    public function actionGetmovies ( $q )
    {
        $rows = new Sqlquery();
        echo($rows->getMovies( $q ,1));
    }
    public function actionPagination( $p, $q, $genre = null )
    {
        $row = new Sqlquery();
        echo($row->pagination( $p, $q, $genre ));

    }
    public function actionMoviesbygenre( $q, $genre )
    {
        $row = new Sqlquery();
        echo($row->findMoviesByGenre( $genre, $q ));
    }

}
