<?php

use app\models\Post;
use yii\helpers\Html;

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
                <h1 class="panel-title"><?= $mPost->title; ?></h1>
            </div>

            <div class="panel-body">
                <table class="table table-hover table-bordered">
                    <?php if ($mPost->primaryImage): ?>
                        <tr>
                            <td class="text-center" colspan="2"><img class="width-250 img-thumbnail" src="<?= $mPost->primaryImage->getSrc(); ?>"></td>
                        </tr>
                    <?php endif; ?>

                    <tr>
                        <td class="width-200"><?= $mPost->getAttributeLabel('id'); ?></td>
                        <td><?= $oFormatter->asText($mPost->id); ?></td>
                    </tr>

                    <tr>
                        <td><?= $mPost->getAttributeLabel('title'); ?></td>
                        <td><?= $oFormatter->asText($mPost->title); ?></td>
                    </tr>

                    <tr>
                        <td><?= $mPost->getAttributeLabel('contentFull'); ?></td>
                        <td><?= $oFormatter->asText($mPost->contentFull); ?></td>
                    </tr>

                    <tr>
                        <td><?= $mPost->getAttributeLabel('contentShort'); ?></td>
                        <td><?= $oFormatter->asText($mPost->contentShort); ?></td>
                    </tr>

                    <tr>
                        <td><?= $mPost->getAttributeLabel('category'); ?></td>
                        <td>
                            <div class="pull-right">ID: <?= $oFormatter->asText($mPost->category->id); ?></div>
                            <?= $oFormatter->asText($mPost->category->title); ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $mPost->getAttributeLabel('status'); ?></td>
                        <td><?= $oFormatter->asText(Post::getStatusLabel($mPost->status)); ?></td>
                    </tr>
                </table>
            </div>

            <div class="panel-footer text-center">
                <?= Html::a(\Yii::t('', 'Update'), ['post/update', 'id' => $mPost->id], ['class' => 'btn btn-primary']); ?>
                <?= Html::a(\Yii::t('', 'Back'), ['post/list'], ['class' => 'btn btn-info']); ?>
            </div>
        </div>

    </div>
</div>