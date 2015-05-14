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
                <div class="pull-right">ID: <?= $mCategory->id; ?></div>
                <h1 class="panel-title"><?= $mCategory->title; ?></h1>
            </div>

            <?php $oForm = ActiveForm::begin(); ?>

            <div class="panel-body">
                <?= $oForm->field($mCategory, 'title'); ?>
                <?= $oForm->field($mCategory, 'description')->textarea(['rows' => 5]); ?>
                <?= $oForm->field($mCategory, 'status')->dropDownList(Category::getStatusesAsDropDown()); ?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::submitButton(\Yii::t('', 'Apply'), ['class' => 'btn btn-primary']); ?>
                <?= Html::a(\Yii::t('', 'Back'), ['category/view', 'id' => $mCategory->id], ['class' => 'btn btn-info']); ?>
                <?= Html::a(\Yii::t('', 'Delete'), ['category/delete', 'id' => $mCategory->id], ['class' => 'btn btn-danger']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>