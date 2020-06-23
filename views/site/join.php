<?php
use yii\widgets\ActiveForm;

$this->registerCssFIle("@web/css/authorization.css");

?>
<div class="row margin justify-content-around  MyMovies" style="padding-top: 50px;" id="colorposter">
    <div class="col-md-12 col-sm-12 col-lg-12 text-center row justify-content-center">
        <div class="col-lg-auto shipping-form" id="registration">
            <h5 class="color-white font-weight-600">Регистрация</h5>
            <?php $form = ActiveForm::begin(['id' => 'user-join-form',
                'options' => ['class' => 'color-white']]); ?>
            <?= $form->field($userJoinForm, 'name')->label(false)->textInput(['placeholder' => 'Логин']) ?>
            <?= $form->field($userJoinForm, 'email')->label(false)->textInput(['placeholder' => 'email']) ?>
            <?= $form->field($userJoinForm, 'password')->label(false)->passwordInput()->textInput(['placeholder' => "Придумайте пароль"]); ?>
            <?= $form->field($userJoinForm, 'password2')->label(false)->passwordInput()->textInput(['placeholder' => "Повторите пароль"]); ?>
            <?= \yii\helpers\Html::submitButton('Create',
                ['class' => '']) ?>
            <?php ActiveForm::end(); ?>
            <div class="registration_authorization row justify-content-center color-white"><div class="toggle-button" style="margin-right: 5px;"><a href="/login">Вход </a></div><div>  в существующую учетную запись</div></div>
        </div>
    </div>
</div>

