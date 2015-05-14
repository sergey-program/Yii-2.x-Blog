<?php

/**
 * @var \app\components\ViewExtended $this
 */
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <p class="alert alert-danger text-center">
            <?php if ($this->isLang('ru')): ?>Ссылка устарела или новость была удалена.<?php endif; ?>
            <?php if ($this->isLang('en')): ?>Such link does not exist.<?php endif; ?>
        </p>
    </div>
</div>
