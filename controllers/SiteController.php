<?php

namespace app\controllers;


use yii\web\Controller;

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
    }
