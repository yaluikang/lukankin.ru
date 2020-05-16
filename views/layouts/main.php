<?php

use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
$action = Yii::$app->controller->action->id;


?>
<!DOCTYPE html>
<html>
<?php $this->beginPage(); ?>
<head>
    <title>HappyViewer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <?php $this->head(); ?>
</head>
<?php $this->beginBody(); ?>
<body>
<header class="container">
    <div class="row margin MyMovies">
        <nav class="navbar navbar-expand-lg navbar-light col-sm-12 col-md-12 col-auto" id="nav">
            <div><a class="navbar-brand col-6" href="<?php echo Url::to(['site/index']); ?>" id="navnav">HappyViewer</a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="padding-left-md navbar-nav mr-auto col-md-auto col-sm-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo Url::to(['site/newItems']); ?>">Новинки<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo Url::to(['site/films']); ?>">Фильмы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo Url::to(['site/tvseries']); ?>">Сериалы</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Что посмотреть?</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 col-md-auto col-sm-auto search" action="<?php echo Url::to(['site/search']); ?>">
                    <input class="form-control mr-sm-2 search" id="test" value="" name="search" type="search" placeholder="Поиск">
                    <button class="btn btn-outline-success my-2 my-sm-0 search" type="submit">Найти</button>
                </form>
            </div>
            <?php
                if(Yii::$app->user->isGuest)
                {
                    echo '<a href="/login">Вход</a>/<a href="/join">Регистрация</a>';
                } else {
                    $name = Yii::$app->user->getIdentity()->name;
                    $urlLogout = Url::to(['site/logout']);
                    echo "<a href='/account'>Личный кабинет(".$name.")</a>/<a href='".$urlLogout."' style='margin-left: 10px;'>Выход</a>";
                }
            ?>
        </nav>
    </div>
</header>
<section class="container">
    <div class="row">
        <div class="jumbotron jumbotron-fluid MyCarousel col-md-12 col-sm-12 col-12" id="Karusel">

            <div id="carouselExampleIndicators" class="carousel slide col-md-12 col-sm-12 col-12" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="css/860babe7-f43c-4b69-a54f-20c544d3282e.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="css/6577fdb5-22a2-4952-9cdc-9c6d8a69c2eb.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="css/5bcf14c5-fc1b-484c-acb0-7c07ffaaba29.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
</section>
<?= $content ?>
<footer class="container postop">

    <div class="row MyButton justify-content-around">
        <div class="col-md-12"><a href=""  class="ulfoot"><img href="#" alt=""><p id="Foot">HappyViewer.ru &copy; 2018-2019</p></a></div>
        <div class="col-md-auto col-12 col-sm-auto">
            <ul>
                <a href="#" class="ulfoot"><li>О нас</li></a>
                <a href="#" class="ulfoot"><li>Соглашение</li></a>
                <a href="#" class="ulfoot"><li>Правообладателям</li></a>
                <a href="#" class="ulfoot"><li>Помощь</li></a>
            </ul>
        </div>
        <div class="col-md-auto col-12 col-sm-auto">
            <p>Получать уведомления о выходе новых серий:</p>
            <ul class="footul">
                <a href="#"><li  class="socimg"><img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/twitter.svg"></li></a>
                <a href="#"><li  class="socimg"><img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/facebook.svg"></li></a>
                <a href="#"><li  class="socimg"><img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/instagram.svg"></li></a>
                <a href="#"><li  class="socimg"><img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/medium.svg"></li></a>
            </ul>
        </div>
    </div >
</footer>
<?php $this->EndBody(); ?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</html>
<?php $this->endPage(); ?>