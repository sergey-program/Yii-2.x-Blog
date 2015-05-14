<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
 * @var \app\components\ViewExtended $this
 * @var \app\models\_formLogin       $fLogin
 */
?>

<div class="row">
    <div class="col-sm-4 col-sm-offset-4">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">
                    <span class="glyphicon glyphicon-user margin-right-15"></span>
                    <span><?= \Yii::t('', 'Authentication'); ?></span>
                </h1>
            </div>

            <?php $oForm = ActiveForm::begin(); ?>

            <div class="panel-body">
                <?= $oForm->field($fLogin, 'username')->textInput(['placeholder' => 'Логин или email...']) ?>
                <?= $oForm->field($fLogin, 'password')->passwordInput() ?>
                <?= $oForm->field($fLogin, 'rememberMe', ['template' => '<div class="col-lg-offset-1 col-lg-3">{input}</div><div class="col-lg-8">{error}</div>'])->checkbox() ?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::submitButton(\Yii::t('', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?= Html::a(\Yii::t('', 'Recover'), ['/'], ['class' => 'btn btn-warning disabled']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>