<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->registerCssFIle("@web/css/authorization.css");
$this->registerCssFIle("@web/css/account.css");
$this->registerJsFile('js/account.js', ['depends' => [\app\assets\AppAsset::class]]);


$name = Yii::$app->user->getIdentity()->name;



 ?>
<div class="row margin justify-content-around  MyMovies" style="padding-top: 50px;" id="colorposter">
    <div class="account col-md-12 col-sm-12 col-lg-12 text-center row justify-content-center" id="account">
        <ul class="menu col-md-4 col-sm-4 col-lg-4" id="menu">
            <div class="row">
                <li class="nav-item color-white font-weight-600 col-md-3 col-sm-3 col-lg-3">
                    <a class="nav-link" href="<?php echo Url::to(['site/newItems']); ?>"><img src="../images/pngwing.com.png" id="icon"><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" id="login">
                    <a class="nav-link color-white font-weight-600 col-md-9 col-sm-9 col-lg-9" href="<?php echo Url::to(['site/newItems']); ?>"><?php echo $name ?><span class="sr-only">(current)</span></a>
                </li>
            </div>
            <li class="nav-item" id="menu-statistics">
                <div class="nav-link">Статистика</div>
            </li>
            <li class="nav-item" id="menu-viewd">
                <div class="nav-link">Просмотрено</div>
            </li>
            <li class="nav-item " id="menu-bookmarks">
                <div class="nav-link">Закладки</div>
            </li>
            <li class="nav-item" id="menu-setting">
                <div class="nav-link">Настройки</div>
            </li>
        </ul>
        <!--</div>-->
        <div class="content col-md-8 col-sm-8 col-lg-8" id="content">
            <div id="setting" class="display-none">
                <div id="one-setting-block" class="row">
                    <div class="col-md-12 col-sm-12 col-12 title font-weight-600">Редактирование профиля</div>
                    <div class="col-md-12 col-sm-12 col-12">
                        <ul class="row">
                            <li class="col-md-4 col-sm-4 col-4">
                                <img src="../images/pngwing.com.png" id="icon-2">
                            </li>
                            <li class="col-md-8 col-sm-8 col-8" id="files-submit">
                                <input accept="image/*" value="Изменить аватар" type="file">
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-sm-12 col-12">
                        <form class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <input type="text" name="name" value="" placeholder="Ваше имя" class="">
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <input type="button" value="Сохранить">
                            </div>
                        </form>
                    </div>
                </div>
                <div id="two-setting-block" class="row">
                    <div class="col-md-12 col-sm-12 col-12 title font-weight-600">Изменение пароля</div>
                    <div class="col-md-12 col-sm-12 col-12">
                        <input type="password" name="old_password" placeholder="Старый пароль" class="input-orange">
                    </div>
                    <div class="col-md-12 col-sm-12 col-12">
                        <input type="password" name="new_password" placeholder="Новый пароль" class="input-orange">
                    </div>
                    <div class="col-md-12 col-sm-12 col-12">
                        <input type="password" name="new_password_2" placeholder="Повторите новый пароль" class="input-orange">
                    </div>
                    <div class="col-md-12 col-sm-12 col-12">
                        <input type="button" value="Изменить">
                    </div>
                </div>
            </div>
            <div id="viewd" class="display-none">
                <p>viewd</p>
            </div>
            <div id="bookmarks" class="display-none row">
                <div class="col-md-6 col-sm-6 col-lg-6 text-center new">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 text-center new">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 text-center new">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 text-center new">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 text-center new">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

            </div>
            <div id="statistics" class="display-none">
                <p>statistics</p>
            </div>
            <?php
/*                if( $markerOfMenu == 'settings')
                {
                    echo '<div id="one-setting-block" class="row">
                            <div class="col-md-12 col-sm-12 col-12 title font-weight-600">Редактирование профиля</div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <ul class="row">
                                    <li class="col-md-4 col-sm-4 col-4">
                                        <img src="../images/pngwing.com.png" id="icon-2">
                                    </li>
                                    <li class="col-md-8 col-sm-8 col-8" id="files-submit">
                                        <input accept="image/*" value="Изменить аватар" type="file">
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <form class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <input type="text" name="name" value="' . $name . '" placeholder="Ваше имя" class="">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <input type="button" value="Сохранить">
                                    </div>
                                </form>
                            </div>
                            </div>
                            <div id="two-setting-block" class="row">
                                <div class="col-md-12 col-sm-12 col-12 title font-weight-600">Изменение пароля</div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <input type="password" name="old_password" placeholder="Старый пароль" class="input-orange">
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <input type="password" name="new_password" placeholder="Новый пароль" class="input-orange">
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <input type="password" name="new_password_2" placeholder="Повторите новый пароль" class="input-orange">
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <input type="button" value="Изменить">
                                </div>
                            </div>';
                } else if( $markerOfMenu == 'viewed' )
                {
                    echo 'viewed';
                } else if( $markerOfMenu == 'bookmarks' )
                {
                    echo json_encode(\app\models\UserBookmarks::getListOfMovies(Yii::$app->user->getId()));
                    echo 'bookmarks';
                } else if( $markerOfMenu == 'statistics' )
                {
                    echo 'statistics';
                }
            */?>

        </div>

    </div>
</div>
