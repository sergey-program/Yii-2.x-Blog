<?php

use app\models\Category;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/**
 * @var \app\components\ViewExtended                              $this
 * @var \app\modules\backendNewsCategories\models\_searchCategory $mSearchCategory
 */
?>

<div class="row margin-top-15">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title"><?= \Yii::t('', 'Categories'); ?></h1>
            </div>

            <div class="panel-body">
                <?php Pjax::begin(); ?>

                <?= GridView::widget([
                    'filterModel' => $mSearchCategory,
                    'dataProvider' => $mSearchCategory->search(\Yii::$app->getRequest()->get()),
                    'columns' => [
                        ['attribute' => 'id'],
                        ['attribute' => 'title'],
                        ['attribute' => 'status', 'filter' => Category::getStatusesAsDropDown()],
                        ['class' => ActionColumn::className()]
                    ]
                ]);
                ?>

                <?php Pjax::end(); ?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::a(\Yii::t('', 'Create'), ['category/create'], ['class' => 'btn btn-primary']); ?>
            </div>
        </div>

    </div>
</div>