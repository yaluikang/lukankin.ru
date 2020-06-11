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
        <!--<div class="col-lg-auto shipping-form" id="authorization">
            <h5 class="color-white font-weight-600">Здесь будет личный кабинет</h5>

        </div>-->
        <!--//<div class="menu col-md-4 col-sm-4 col-lg-4" id="menu">-->
            <!--<div class="row">
                <div class="color-white font-weight-600 col-md-3 col-sm-3 col-lg-3">
                    <img src="../images/pngwing.com.png" id="icon">
                </div>
                <div class="color-white font-weight-600 col-md-9 col-sm-9 col-lg-9" id="login"><?php /*$name = Yii::$app->user->getIdentity()->name; */?></div>
            </div>
            <div>Статистика</div>
            <div>Просмотрено</div>
            <div>Закладки</div>
            <div>Настройки</div>-->
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
                Статистика
            </li>
            <li class="nav-item" id="menu-viewd">
                Просмотрено
            </li>
            <li class="nav-item " id="menu-bookmarks">
                Закладки
            </li>
            <li class="nav-item" id="menu-setting">
                Настройки
            </li>
        </ul>
        <!--</div>-->
        <div class="content col-md-8 col-sm-8 col-lg-8">
            <div id="setting">
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
                </div>
            </div>
            <div id="viewd">
                <p>viewd</p>
            </div>
            <div id="bookmarks">
                <p>bookmarks</p>
            </div>
            <div id="statistics">
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
