<?php

/**
 * @var $this yii\web\View
 */
use app\models\Category;

?>

<div class="row-fluid">
    <div class="col-md-3">
        <div class="list-group">
            <?php foreach (Category::find()->all() as $mCategory): ?>
                <a class="list-group-item" href="#"><?= $mCategory->title; ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-md-8">
        asdfsadf
    </div>
</div>