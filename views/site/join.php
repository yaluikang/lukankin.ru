<?php
use yii\widgets\ActiveForm;

$this->registerCssFIle("@web/css/authorization.css");

?>
<div class="row margin justify-content-around  MyMovies" style="padding-top: 50px;" id="colorposter">
    <div class="col-md-12 col-sm-12 col-lg-12 text-center row justify-content-center">
        <div class="col-lg-auto shipping-form display-none" id="registration">
            <h5 class="color-white font-weight-600">Регистрация</h5>
            <?php $form = ActiveForm::begin(['id' => 'user-join-form']); ?>
            <?= $form->field($userJoinForm, 'name') ?>
            <?= $form->field($userJoinForm, 'email') ?>
            <?= $form->field($userJoinForm, 'password')->passwordInput(); ?>
            <?= $form->field($userJoinForm, 'password2')->passwordInput(); ?>
            <?= \yii\helpers\Html::submitButton('Create',
                ['class' => 'btn']) ?>
            <?php ActiveForm::end(); ?>
            <div class="registration_authorization row justify-content-center color-white"><div class="toggle-button" style="margin-right: 5px;">Вход </div><div>  в существующую учетную запись</div></div>
        </div>
    </div>
</div>

