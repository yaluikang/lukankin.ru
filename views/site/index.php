<?php

    use yii\helpers\Url;

    $this->registerJsFile('js/index.js', ['depends' => [\app\assets\AppAsset::class]]);
    if( $_SERVER['REQUEST_URI'] == '/tvseries' )
    {
        $this->registerJsFile('js/tvseries.js', ['depends' => [\app\assets\AppAsset::class]]);
    } else if( $_SERVER['REQUEST_URI'] == '/films' || $_SERVER['REQUEST_URI'] == '/' )
    {
        $this->registerJsFile('js/films.js', ['depends' => [\app\assets\AppAsset::class]]);
    }
?>
<div class="row MyMovies">
    <ul class="nav nav-tabs col-md col-sm col-" id="myTab" role="tablist">
        <li class="nav-item col-md-auto col-sm-auto col-auto paddingnol">
            <a class="nav-link active films" id="films" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">Фильмы</a>
        </li>
        <li class="nav-item col-md-auto col-sm-auto col-auto paddingnol">
            <a class="nav-link tvSeries" id="tvSeries" data-toggle="tab" href="#" role="tab" aria-controls="profile" aria-selected="false">Сериалы</a>
        </li>
    </ul>
</div>
<div class="row border-active justify-content-between backcolorwhite MyMovies">
    <div class="tab-content col-md-auto col-sm-auto col-auto margin-top" id="myTabContent">
        <!-- Меню фильмов-->
        <div class="tab-pane fade show active margin-left" id="home" role="tabpanel" aria-labelledby="home-tab">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Популярные</a>
                </li>

                <li class="nav-item margin-item">
                    <a class="nav-link" href="#">Новинки</a>
                </li>
                <li class="nav-item dropdown margin-item">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Жанр</a>
                    <div class="dropdown-menu container">
                        <div class="row dropdown-menu-row-genres">
                            <span class="dropdown-item col-lg-3 search-genre" id="test">Биография</span>
                            <span class="dropdown-item col-lg-3 search-genre">Боевик</span>
                            <span class="dropdown-item col-lg-3 search-genre">Военный</span>
                            <span class="dropdown-item col-lg-3 search-genre">Детектив</span>
                        </div>
                        <div class="row dropdown-menu-row-genres">
                            <span class="dropdown-item col-lg-3 search-genre">Драма</span>
                            <span class="dropdown-item col-lg-3 search-genre">Комедия</span>
                            <span class="dropdown-item col-lg-3 search-genre">Криминал</span>
                            <span class="dropdown-item col-lg-3 search-genre">Мелодрама</span>
                        </div>
                        <div class="row dropdown-menu-row-genres">
                            <span class="dropdown-item col-lg-3 search-genre">Музыка</span>
                            <span class="dropdown-item col-lg-3 search-genre">Мультфильм</span>
                            <span class="dropdown-item col-lg-3 search-genre">Приключения</span>
                            <span class="dropdown-item col-lg-3 search-genre">Триллер</span>
                        </div>
                        <div class="row dropdown-menu-row-genres">
                            <span class="dropdown-item col-lg-3 search-genre">Ужасы</span>
                            <span class="dropdown-item col-lg-3 search-genre">Фантастика</span>
                            <span class="dropdown-item col-lg-3 search-genre">Фэнтези</span>
                        </div>
                        <!--<div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a-->
                    </div>
                </li>
            </ul>
        </div>


        <!-- Меню сериалов-->
        <div class="tab-pane fade margin-left" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Популярные</a>
                </li>

                <li class="nav-item margin-item">
                    <a class="nav-link" href="#">Новинки</a>
                </li>
                <li class="nav-item dropdown margin-item">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Жанр</a>
                    <div class="dropdown-menu container">
                        <div class="row dropdown-menu-row-genres">
                            <span class="dropdown-item col-lg-3 search-genre">Биография</span>
                            <span class="dropdown-item col-lg-3 search-genre">Боевик</span>
                            <span class="dropdown-item col-lg-3 search-genre">Военный</span>
                            <span class="dropdown-item col-lg-3 search-genre">Детектив</span>
                        </div>
                        <div class="row dropdown-menu-row-genres">
                            <span class="dropdown-item col-lg-3 search-genre">Драма</span>
                            <span class="dropdown-item col-lg-3 search-genre">Комедия</span>
                            <span class="dropdown-item col-lg-3 search-genre">Криминал</span>
                            <span class="dropdown-item col-lg-3 search-genre">Мелодрама</span>
                        </div>
                        <div class="row dropdown-menu-row-genres">
                            <span class="dropdown-item col-lg-3 search-genre">Музыка</span>
                            <span class="dropdown-item col-lg-3 search-genre">Мультфильм</span>
                            <span class="dropdown-item col-lg-3 search-genre">Приключения</span>
                            <span class="dropdown-item col-lg-3 search-genre">Триллер</span>
                        </div>
                        <div class="row dropdown-menu-row-genres">
                            <span class="dropdown-item col-lg-3 search-genre">Ужасы</span>
                            <span class="dropdown-item col-lg-3 search-genre">Фантастика</span>
                            <span class="dropdown-item col-lg-3 search-genre">Фэнтези</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class=" col-md-auto col-sm-auto col-auto margin-top paddingimp">
        <form class="form-inline my-lg-0" action="<?php echo Url::to(['site/search']); ?>">
            <input class="form-control mr-sm-2 col-md col-sm" type="search" placeholder="Поиск">
        </form>
        <a href="#"><p class="text-capitalize text-nowrap">Расширенный поиск</p></a>
    </div>
</div>
<div class="row margin justify-content-around  MyMovies" style="padding-top: 50px;" id="colorposter">
</div>
<div class="container postop" id="see-more">
    <div class="row  MyButton">
        <button type="button" class="btn btn-primary btn-lg btn-block">Показать ещё</button>
    </div>
</div>