<?php

use app\models\Category;
use app\models\Post;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var \app\components\ViewExtended     $this
 * @var \app\models\Post                 $mPost
 * @var \app\models\_formPostImageUpload $fPostImageUpload
 */
?>

<div class="row margin-top-15">
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">ID: <?= $mPost->id; ?></div>
                <h1 class="panel-title"><?= $mPost->title; ?></h1>
            </div>

            <?php $oForm = ActiveForm::begin(); ?>

            <div class="panel-body">
                <?= $oForm->field($mPost, 'title'); ?>
                <?= $oForm->field($mPost, 'contentFull')->textarea(['rows' => 5]); ?>
                <?= $oForm->field($mPost, 'contentShort')->textarea(['rows' => 2]); ?>
                <?= $oForm->field($mPost, 'status')->dropDownList(Post::getStatusesAsDropDown()); ?>
                <?= $oForm->field($mPost, 'categoryID')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'title'), ['prompt' => \Yii::t('', 'Select status') . '...']); ?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::submitButton(\Yii::t('', 'Apply'), ['class' => 'btn btn-primary']); ?>
                <?= Html::a(\Yii::t('', 'Back'), ['post/view', 'id' => $mPost->id], ['class' => 'btn btn-info']); ?>
                <?= Html::a(\Yii::t('', 'Delete'), ['post/delete', 'id' => $mPost->id], ['class' => 'btn btn-danger']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><?= \Yii::t('', 'Upload image'); ?></div>

            <?php $oForm = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <div class="panel-body">
                <?= $oForm->field($fPostImageUpload, 'file')->fileInput(); ?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::submitButton(\Yii::t('', 'Upload'), ['class' => 'btn btn-primary']); ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>