<?php

use app\widgets\frontend\PostViewShort;
use yii\widgets\LinkPager;

/**
 * @var \yii\web\View          $this
 * @var \app\models\Category[] $aCategory
 * @var \app\models\Post[]     $aPost
 * @var \yii\data\Pagination   $oPagination
 */
?>

<div class="row-fluid">
    <div class="col-md-3">
        <div class="list-group">

            <?php foreach ($aCategory as $mCategory): ?>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><?= $mCategory->title; ?></h4>
                    <p class="list-group-item-text"><?= $mCategory->description; ?></p>
                </a>
            <?php endforeach; ?>

        </div>
    </div>

    <div class="col-md-8">
        <?php foreach ($aPost as $mPost): ?>
            <?= PostViewShort::widget(['mPost' => $mPost]); ?>
        <?php endforeach; ?>

        <div class="text-center">
            <?= LinkPager::widget(['pagination' => $oPagination]); ?>
        </div>
    </div>
</div>