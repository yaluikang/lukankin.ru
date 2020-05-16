<?php
use yii\widgets\ActiveForm;

$this->registerCssFIle("@web/css/authorization.css");

?>
<div class="row margin justify-content-around  MyMovies" style="padding-top: 50px;" id="colorposter">
    <div class="col-md-12 col-sm-12 col-lg-12 text-center row justify-content-center">
        <div class="col-lg-auto shipping-form" id="authorization">
            <h5 class="color-white font-weight-600">Авторизация</h5>
            <?php $form = ActiveForm::begin(['id' => 'user-login-form']); ?>
            <?= $form->field($userLoginForm, 'email') ?>
            <?= $form->field($userLoginForm, 'password')->passwordInput(); ?>
            <?= \yii\helpers\Html::submitButton('Enter',
                ['class' => 'btn']) ?>
            <?php ActiveForm::end(); ?>
            <div class="registration_authorization row justify-content-center color-white"><div class="toggle-button" style="margin-right: 5px;"><a href="/join">Регистрация</a> </div><div>  нового пользователя</div></div>
        </div>
    </div>
</div>
