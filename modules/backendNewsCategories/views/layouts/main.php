<?php

use yii\helpers\Url;

/**
 * @var \app\components\ViewExtended $this
 * @var string                       $content
 */
?>

<?php $this->beginContent('@app/views/layouts/backend.php'); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group" role="group" aria-label="some text below">
                <a class="btn btn-primary btn-default" href="<?= Url::to(['index/index']) ?>"><?= \Yii::t('', 'Backend News Categories'); ?></a>
            </div>
        </div>
    </div>

    <?= $content; ?>

<?php $this->endContent(); ?>