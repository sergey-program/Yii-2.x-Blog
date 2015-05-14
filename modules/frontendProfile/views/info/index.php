<?php

/**
 * @var \app\components\ViewExtended $this
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title"><?= \Yii::t('', 'Information'); ?> "<?= $this->getUser()->getUsername(); ?>"</h1>
    </div>

    <div class="panel-body">
        <p class="alert alert-info text-center"><?= \Yii::t('', 'Under construction'); ?>.</p>
    </div>
</div>