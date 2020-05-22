<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFIle("@web/css/authorization.css");

 ?>
<div class="row margin justify-content-around  MyMovies" style="padding-top: 50px;" id="colorposter">
    <div class="account col-md-12 col-sm-12 col-lg-12 text-center row justify-content-center">
        <!--<div class="col-lg-auto shipping-form" id="authorization">
            <h5 class="color-white font-weight-600">Здесь будет личный кабинет</h5>

        </div>-->
        <div class="menu col-md-4 col-sm-4 col-lg-4">
            <div class="color-white font-weight-600">Никнейм</div>
            <div>Просмотрено</div>
            <div>Закладки</div>
            <div>Статистика</div>
            <div>Настройки</div>
        </div>
        <div class="content col-md-8 col-sm-8 col-lg-8">
            <h5 class="color-white font-weight-600">Контент</h5>
        </div>

    </div>
</div>
