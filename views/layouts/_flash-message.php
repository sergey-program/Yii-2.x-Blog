<?php

/**
 * @var \app\components\ViewExtended $this
 */
?>

<?php if ($this->getSession()->hasFlash('flash_danger')): ?>
    <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <span><?= $this->getSession()->getFlash('flash_danger'); ?></span>
    </div>
<?php endif; ?>

<?php if ($this->getSession()->hasFlash('flash_success')): ?>
    <div class="alert alert-success alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <span><?= $this->getSession()->getFlash('flash_success'); ?></span>
    </div>
<?php endif; ?>

<?php if ($this->getSession()->hasFlash('flash_info')): ?>
    <div class="alert alert-info alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <span><?= $this->getSession()->getFlash('flash_info'); ?></span>
    </div>
<?php endif; ?>