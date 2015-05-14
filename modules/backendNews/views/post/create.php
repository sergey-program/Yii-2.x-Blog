<?php

use app\models\Category;
use app\models\Post;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var \app\components\ViewExtended $this
 * @var \app\models\Post             $mPost
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
                <?= $oForm->field($mPost, 'title'); ?>
                <?= $oForm->field($mPost, 'contentFull')->textarea(['rows' => 4]); ?>
                <?= $oForm->field($mPost, 'contentShort')->textarea(['rows' => 2]); ?>
                <?= $oForm->field($mPost, 'status')->dropDownList(Post::getStatusesAsDropDown(), ['prompt' => \Yii::t('', 'Select status') . '...']); ?>
                <?= $oForm->field($mPost, 'categoryID')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'title'), ['prompt' => \Yii::t('', 'Select status') . '...']); ?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::submitButton(\Yii::t('', 'Create'), ['class' => 'btn btn-primary']); ?>
                <?= Html::a(\Yii::t('', 'Back'), ['post/list'], ['class' => 'btn btn-info']); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>