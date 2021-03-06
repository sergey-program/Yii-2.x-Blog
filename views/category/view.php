<?php

use app\widgets\frontend\PostViewShort;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/**
 * @var \app\components\ViewExtended $this
 * @var \app\models\Category         $mCategory
 * @var \app\models\Post[]           $aPost
 * @var \yii\data\Pagination         $oPagination
 */

$oFormatter = \Yii::$app->getFormatter();

?>

<div class="row margin-top-15">
    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right"><?= $oFormatter->asDatetime($mCategory->timeCreate); ?></div>
                <h1 class="panel-title"><?= $mCategory->title; ?></h1>
            </div>

            <div class="panel-body">
                <?= $mCategory->description; ?>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <?php foreach ($aPost as $mPost): ?>
            <?= PostViewShort::widget(['mPost' => $mPost]); ?>
        <?php endforeach; ?>

        <div class="text-center">
            <?= LinkPager::widget(['pagination' => $oPagination]); ?>
        </div>
        
    </div>
</div>