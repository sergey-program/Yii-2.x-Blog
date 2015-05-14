<?php

use app\models\Category;
use yii\helpers\Html;

/**
 * @var \app\components\ViewExtended $this
 * @var \app\models\Category         $mCategory
 */

$oFormatter = \Yii::$app->getFormatter();

?>

<div class="row margin-top-15">
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title"><?= $mCategory->title; ?></h1>
            </div>

            <div class="panel-body">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td class="width-200"><?= $mCategory->getAttributeLabel('id'); ?></td>
                        <td><?= $oFormatter->asText($mCategory->id); ?></td>
                    </tr>

                    <tr>
                        <td><?= $mCategory->getAttributeLabel('title'); ?></td>
                        <td><?= $oFormatter->asText($mCategory->title); ?></td>
                    </tr>

                    <tr>
                        <td><?= $mCategory->getAttributeLabel('description'); ?></td>
                        <td><?= $oFormatter->asText($mCategory->description); ?></td>
                    </tr>

                    <tr>
                        <td><?= $mCategory->getAttributeLabel('status'); ?></td>
                        <td><?= $oFormatter->asText(Category::getStatusLabel($mCategory->status)); ?></td>
                    </tr>
                </table>
            </div>

            <div class="panel-footer text-center">
                <?= Html::a(\Yii::t('', 'Update'), ['category/update', 'id' => $mCategory->id], ['class' => 'btn btn-primary']); ?>
                <?= Html::a(\Yii::t('', 'Back'), ['category/list'], ['class' => 'btn btn-info']); ?>
            </div>
        </div>

    </div>
</div>