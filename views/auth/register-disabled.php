<?php

/**
 * @var \app\components\ViewExtended $this
 */
?>

<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <p class="alert alert-info text-center">
            <?php if ($this->isLang('ru')): ?>Регистрация временно закрыта.<?php endif; ?>
            <?php if ($this->isLang('en')): ?>Register temporary closed.<?php endif; ?>
        </p>
    </div>
</div>