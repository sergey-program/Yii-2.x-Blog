<?php

use yii\helpers\Url;

/**
 * @var \app\components\ViewExtended $this
 * @var \app\models\Post             $mPost
 */

$oFormatter = \Yii::$app->getFormatter();

?>

<div class="row margin-top-15">
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right"><?= $oFormatter->asDatetime($mPost->timeCreate); ?></div>
                <h1 class="panel-title"><?= $mPost->title; ?></h1>
            </div>

            <div class="panel-body">
                <?= $mPost->contentFull; ?>
            </div>

            <div class="panel-footer">
                <span><?= \Yii::t('', 'Author'); ?>: <?= $mPost->user->username; ?></span> |
                <span><?= \Yii::t('', 'Category'); ?>: <a href="<?= Url::to(['/category/view', 'id' => $mPost->category->id]); ?>"><?= $mPost->category->title; ?></a></span>
            </div>
        </div>

    </div>
</div>