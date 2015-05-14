<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var \app\components\ViewExtended $this
 * @var \app\models\_formRegister    $fRegister
 */
?>

<div class="row">
    <div class="col-sm-4 col-sm-offset-4">

        <?php if ($this->getSession()->hasFlash('mailNotSentError')): ?>
            <p class="alert alert-danger text-center">
                <?php if ($this->isLang('ru')): ?>Ошибка при отправке письма.<br/>Пожалуста свяжитесь с администрацией.<?php endif; ?>
                <?php if ($this->isLang('en')): ?>Error on sending mail.<br/>Please contact administration.<?php endif; ?>
            </p>
        <?php elseif ($this->getSession()->hasFlash('mailSent')): ?>
            <p class="alert alert-success text-center">
                <?php if ($this->isLang('ru')): ?>На указанный email было выслано письмо с ссылкой для подтверждения аккаунта.<?php endif; ?>
                <?php if ($this->isLang('en')): ?>Confirm mail was sent to your mail.<?php endif; ?>
            </p>
            <p class="alert alert-danger text-center">
                <?php if ($this->isLang('ru')): ?>Неподтверждённые аккаунты будут удалены в течении месяца.<?php endif; ?>
                <?php if ($this->isLang('en')): ?>Unconfirmed accounts will be deleted in a month.<?php endif; ?>
            </p>
        <?php else: ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><span class="glyphicon glyphicon-user margin-right-15"></span><?= \Yii::t('', 'Sing up'); ?></h1>
                </div>

                <?php $oForm = ActiveForm::begin(); ?>

                <div class="panel-body">
                    <?= $oForm->field($fRegister, 'username')->textInput(['placeholder' => 'Only A-Z, a-z, 0-9 symbols...']); ?>
                    <?= $oForm->field($fRegister, 'email')->textInput(['placeholder' => 'username@example.ru']); ?>
                    <?= $oForm->field($fRegister, 'password')->passwordInput(); ?>
                    <?= $oForm->field($fRegister, 'passwordRepeat')->passwordInput(); ?>
                </div>

                <div class="panel-footer text-center">
                    <?= Html::submitButton(\Yii::t('', 'Sing up'), ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>