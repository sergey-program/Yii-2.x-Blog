<?php

use app\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var \app\components\ViewExtended $this
 * @var \app\models\Category         $mCategory
 */
?>

<div class="row margin-top-15">
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title"><?= \Yii::t('', 'Create'); ?></h1>
            </div>

            <?php $oForm = ActiveForm::begin(); ?>

            <div class="panel-body">
                <?= $oForm->field($mCategory, 'title'); ?>
                <?= $oForm->field($mCategory, 'description')->textarea(['rows' => 2]); ?>
                <?= $oForm->field($mCategory, 'status')->dropDownList(Category::getStatusesAsDropDown(), ['prompt' => \Yii::t('', 'Select status') . '...']); ?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::submitButton(\Yii::t('', 'Create'), ['class' => 'btn btn-primary']); ?>
                <?= Html::a(\Yii::t('', 'Back'), ['category/list'], ['class' => 'btn btn-info']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>