<?php

namespace app\controllers;


use app\models\ChangeLoginForm;
use app\models\Movies;
use app\models\Movies_has_genre;
use app\models\UserBookmarks;
use app\models\UserIdentity;
use app\models\UserJoinForm;
use app\models\UserLoginForm;
use app\models\UserRecord;
use Yii;
use yii\web\Controller;
use app\models\Sqlquery;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public function actionRandommovie()
    {
        $count = new Sqlquery();
        $count = $count->getCountOfMovies();
        $randomInt = rand( 1, $count['count']);
        echo 'randomint: ', $randomInt;
        $this->actionMovie( $randomInt );
        /*$contentForMovie = new Sqlquery();
        $contentForMovie = $contentForMovie->getContentForMovie( $randomInt );
        return $this->render('movie.php', [ 'contentForMovie' => $contentForMovie ]);*/
    }

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
        echo 'id:', $id;
        $contentForMovie = new Sqlquery();
        $contentForMovie = $contentForMovie->getContentForMovie( $id );
        return $this->render('movie.php', [ 'contentForMovie' => $contentForMovie ]);
    }

    public function actionAccount( $m = 'statistics')
    {
        $changeImage = new UploadForm();
        $changeLogin = new ChangeLoginForm();

        if ($changeImage->load(Yii::$app->request->post())) {
            $changeImage->imageFile = UploadedFile::getInstance($changeImage, 'imageFile');
            if ($changeImage->upload()) {
                return $this->redirect('account');
            }
        }
        if ($changeLogin->load(Yii::$app->request->post()))
        {
            if($changeLogin->validate())
            {
                echo $changeLogin->changeLogin();
                //return $this->redirect('account');
            }
        }

        return $this->render('account', ['changeImage' => $changeImage, 'changeLogin' => $changeLogin]);
    }
    public function actionSearch()
    {
        return $this->render('search');
    }

    public function actionJoin()
    {
        $userJoinForm = new UserJoinForm();
        if(Yii::$app->request->isPost)
            return $this->actionJoinPost();
        $userJoinForm = new UserJoinForm();

        return $this->render('join', ['userJoinForm' => $userJoinForm]);
    }

    private function actionJoinPost()
    {
        $userJoinForm = new UserJoinForm();
        if($userJoinForm->load(Yii::$app->request->post()))
            if($userJoinForm->validate()) {
                $userRecord = new UserRecord();
                $userRecord->setUserJoinForm($userJoinForm);
                $userRecord->save();
                return $this->redirect('/login');
            }
        return $this->render('join', ['userJoinForm' => $userJoinForm]);
    }

    public function actionLogin ()
    {
        if (Yii::$app->request->isPost)
            return $this->actionLoginPost();
        $userLoginForm = new UserLoginForm();
        return $this->render('login', compact('userLoginForm'));
    }

    private function actionLoginPost()
    {
        $userLoginForm = new UserLoginForm();
        if ($userLoginForm->load(Yii::$app->request->post()))
            if ($userLoginForm->validate())
            {
                $userLoginForm->login();
                return $this->redirect('/');
            }
        return $this->render('login', compact('userLoginForm'));
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

    public function actionTest()
    {
        //UserBookmarks::addBookmarksToDb(1);
        $session = Yii::$app->session;
        $session->set('movies', 'en-US');
        return $session->get('movies');
    }

    public function actionSetnewcookies()
    {
        if(Yii::$app->user->isGuest){
            return;
        } else
        {
            echo(UserBookmarks::addBookmarksToDb(Yii::$app->user->getId()));
        }
    }

    public function actionGetbookmarks()
    {
        $contentForMovie = new Sqlquery();
        $contentForMovie = $contentForMovie->getContentForMovie( UserBookmarks::getListOfMovies(Yii::$app->user->getId()) );
        echo json_encode( $contentForMovie,JSON_UNESCAPED_UNICODE );
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('account', ['model' => $model]);
    }
}
