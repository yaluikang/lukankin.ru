<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFIle("@web/css/authorization.css");

 ?>
<div class="row margin justify-content-around  MyMovies" style="padding-top: 50px;" id="colorposter">
    <div class="col-md-12 col-sm-12 col-lg-12 text-center row justify-content-center">
        <div class="col-lg-auto shipping-form" id="authorization">
            <h5 class="color-white font-weight-600">Авторизация</h5>
            <form class="form-authorization" action="/authorization/authorization.php" method="post">
                <input class="form-control mr-sm-2 authorization" id="test" data-hint="Подсказка" value="" name="login" type="search" placeholder="Логин" />
                <input class="form-control mr-sm-2 authorization" value="" name="password" type="password" placeholder="Пароль" />
                <input class="btn btn-outline-success my-2 my-sm-0 authorization" name="log_in" type="submit" value="Войти" />
            </form>
            <div class="registration_authorization row justify-content-center color-white"><div class="toggle-button" style="margin-right: 5px;">Регистрация </div><div>  нового пользователя</div></div>
        </div>
        <div class="col-lg-auto shipping-form display-none" id="registration">
            <h5 class="color-white font-weight-600">Регистрация</h5>
            <form class="form-authorization" action="/authorization" method="post">
                <div class="form-group field-userjoinform-email">
                    <label class="control-label" for="userjoinform-email">Email</label>
                    <input id="userjoinform-email" class="form-control mr-sm-2 authorization" data-hint="Подсказка" value="" name="UserJoinForm[email]" type="search" placeholder="Mail" />
                    <div class="help-block"></div>
                </div>
                <div class="form-group field-userjoinform-name">
                    <label class="control-label" for="userjoinform-name">Логин</label>
                    <input id="userjoinform-name" class="form-control mr-sm-2 authorization" value="" name="UserJoinForm[name]" type="search" placeholder="Логин" />
                    <div class="help-block"></div>
                </div>
                <div class="form-group field-userjoinform-password">
                    <label class="control-label" for="userjoinform-password">Пароль</label>
                    <input id="userjoinform-password" class="form-control mr-sm-2 authorization" value="" name="UserJoinForm[password]" type="password" placeholder="Пароль" />
                    <div class="help-block"></div>
                </div>
                <div class="form-group field-userjoinform-password2">
                    <label class="control-label" for="userjoinform-password2">Пароль</label>
                    <input id="userjoinform-password2" class="form-control mr-sm-2 authorization" value="" name="UserJoinForm[password2]" type="password" placeholder="Повторите пароль" />
                    <div class="help-block"></div>
                </div>
                <input class="btn btn-outline-success my-2 my-sm-0 authorization" type="submit" value="Зарегистрироваться" />
            </form>
            <div class="registration_authorization row justify-content-center color-white"><div class="toggle-button" style="margin-right: 5px;">Вход </div><div>  в существующую учетную запись</div></div>
        </div>
    </div>
</div>
<script>
    $(window).on('load',function(){
        console.log($.cookie('registration'));
        if($.cookie('registration') == 'true'){
            toggle_reg_autho();
        }
    });
    let $checkMsg = $('form.form-authorization').attr('data-msg');
    $('.toggle-button').each(function(){
        $(this).on('click', toggle_reg_autho);
    });
    function toggle_reg_autho(){
        $('#registration').toggleClass("display-none");
        $('#authorization').toggleClass("display-none");
        if($('#authorization').hasClass("display-none")){
            $.cookie('authorization','false');
            $.cookie('registration','true');
        } else {
            $.cookie('authorization','true');
            $.cookie('registration','false');
        }
    };
    function hint() {
        let $coords = $('input[data-hint=Подсказка]')[0].getBoundingClientRect();
        let $top = $coords.top + window.scrollY  + 'px';
        let $left = 10 + $coords.right  + window.scrollX + 'px';
        let $hintDiv = $('<div>',{
            class: 'hint',
            css: {
                position: 'absolute',
                padding: '10px',
                border: '1px solid black',
                borderRadius: '5px',
                top: $top,
                left: $left,
                backgroundColor: 'white'
            },
            text: $checkMsg
        });
        $hintDiv.appendTo('body');
        $('body').one('click',function(){
            $($hintDiv).css('display','none');
        });
    };
    if(typeof $checkMsg != typeof undefined && $checkMsg != false){
        hint();
    }
</script>
