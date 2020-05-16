<?php

namespace app\controllers;


use app\models\Movies;
use app\models\Movies_has_genre;
use app\models\UserIdentity;
use app\models\UserRecord;
use Yii;
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
        return $this->render('index');
    }

    public function actionTvseries ()
    {
        return $this->render('index');
    }

    public function actionMovie ( $id )
    {
        $contentForMovie = new Sqlquery();
        $contentForMovie = $contentForMovie->getContentForMovie( $id );
        return $this->render('movie.php', [ 'contentForMovie' => $contentForMovie ]);
    }

    public function actionSearch()
    {
        return $this->render('search');
    }

    public function actionAuthorization()
    {
        /*$userRecord = new UserRecord();
        $userRecord->setTestUser();
        $userRecord->save();*/
        $uid = UserIdentity::findIdentity(1);
        Yii::$app->user->login($uid);

        return $this->render('authorization');
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

    public function actionSearchform( $search )
    {
        $row = new Sqlquery();
        echo($row->getMovieBySearch( $search ));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect("/");
    }

}
