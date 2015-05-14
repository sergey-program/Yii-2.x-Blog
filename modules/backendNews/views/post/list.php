<?php

use app\models\Post;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/**
 * @var \app\components\ViewExtended                $this
 * @var \app\modules\backendNews\models\_searchPost $mSearchPost
 */
?>

<div class="row margin-top-15">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title"><?= \Yii::t('', 'News'); ?></h1>
            </div>

            <div class="panel-body">
                <?php Pjax::begin(); ?>

                <?= GridView::widget([
                    'filterModel' => $mSearchPost,
                    'dataProvider' => $mSearchPost->search(\Yii::$app->getRequest()->get()),
                    'columns' => [
                        ['attribute' => 'id'],
                        ['attribute' => 'title'],
                        ['attribute' => 'status', 'filter' => Post::getStatusesAsDropDown()],
                        ['class' => ActionColumn::className()]
                    ]
                ]); ?>

                <?php Pjax::end(); ?>
            </div>

            <div class="panel-footer text-center">
                <?= Html::a(\Yii::t('', 'Create'), ['post/create'], ['class' => 'btn btn-primary']); ?>
            </div>
        </div>

    </div>
</div>