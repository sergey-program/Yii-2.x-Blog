<?php

use yii\helpers\Url;

/**
 * @var \app\components\ViewExtended $this
 * @var string                       $content
 */
?>

<?php $this->beginContent('@app/views/layouts/backend.php'); ?>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a class="list-group-item" href="<?= Url::to(['index/index']); ?>">
                    <span><i class="glyphicon glyphicon-chevron-right pull-right"></i><?= \Yii::t('', 'Profile'); ?></span>
                </a>
            </div>

            <div class="list-group">
                <a class="list-group-item" href="<?= Url::to(['info/index']); ?>">
                    <span><i class="glyphicon glyphicon-chevron-right pull-right"></i><?= \Yii::t('', 'My information'); ?></span>
                </a>

                <a class="list-group-item" href="<?= Url::to(['password/index']) ?>">
                    <span><i class="glyphicon glyphicon-chevron-right pull-right"></i><?= \Yii::t('', 'Change password'); ?></span>
                </a>
            </div>
        </div>

        <div class="col-md-9">
            <?= $this->render('//layouts/_flash-message'); ?>
            <?= $content; ?>
        </div>
    </div>

<?php $this->endContent(); ?>