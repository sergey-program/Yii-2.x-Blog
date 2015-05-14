<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var \app\components\ViewExtended                            $this
 * @var \app\modules\frontendProfile\models\_formPasswordChange $fPasswordChange
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title"><?= \Yii::t('', 'Change password'); ?></h1>
    </div>

    <div class="panel-body">
        <div class="col-md-6">
            <?php $oForm = ActiveForm::begin(['id' => 'change_password']); ?>

            <?= $oForm->field($fPasswordChange, 'oldPassword')->passwordInput(); ?>
            <?= $oForm->field($fPasswordChange, 'newPassword')->passwordInput(); ?>
            <?= $oForm->field($fPasswordChange, 'newPasswordRepeat')->passwordInput(); ?>

            <div class="form-group text-center">
                <?= Html::submitButton(\Yii::t('', 'Apply'), ['class' => 'btn btn-primary']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-6">
            <h4 class="text-center">
                <?php if ($this->isLang('ru')): ?>Доп. информация о смене пароля.<?php endif; ?>
                <?php if ($this->isLang('end')): ?>Additional info about changing password.<?php endif; ?>
            </h4>
            <p class="alert alert-info text-center"><?= \Yii::t('', 'Under construction'); ?>.</p>
        </div>
    </div>
</div>