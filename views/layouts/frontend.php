<?php

/**
 * @var \app\components\ViewExtended $this
 * @var string                       $content
 */
?>

<?php $this->beginContent('@app/views/layouts/main.php'); ?>

    <div class="row">
        <div class="col-sm-12">
            <?= $content; ?>
        </div>
    </div>

<?php $this->endContent(); ?>