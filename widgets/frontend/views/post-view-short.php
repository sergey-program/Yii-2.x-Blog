<?php

use yii\helpers\Url;

/**
 * @var \app\components\ViewExtended $this
 * @var \app\models\Post             $mPost
 */

$oFormatter = \Yii::$app->getFormatter();

?>


<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-right"><?= $oFormatter->asDatetime($mPost->timeCreate); ?></div>
        <h1 class="panel-title"><a href="<?= Url::to(['/post/view', 'id' => $mPost->id]); ?>"><?= $mPost->title; ?></a></h1>
    </div>

    <div class="panel-body text-justify">
        <?php if ($mPost->primaryImage): ?>
            <img class="width-200 pull-left img-thumbnail margin-right-15" src="<?= $mPost->primaryImage->getSrc(); ?>">
        <?php endif; ?>

        <?= $mPost->contentShort; ?>
    </div>

    <div class="panel-footer">
        <div class="pull-right"><a href="<?= Url::to(['/post/view', 'id' => $mPost->id]); ?>"><?= \Yii::t('', 'Details'); ?></a></div>
        <span><?= \Yii::t('', 'Author'); ?>: <?= $mPost->user->username; ?></span> |
        <span><?= \Yii::t('', 'Category'); ?>: <a href="<?= Url::to(['/category/view', 'id' => $mPost->category->id]); ?>"><?= $mPost->category->title; ?></a></span>
    </div>
</div>