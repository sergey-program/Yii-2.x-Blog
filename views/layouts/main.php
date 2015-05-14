<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);

/**
 * @var \app\components\ViewExtended $this
 * @var string                       $content
 */
?>

<?php $this->beginPage(); ?>

    <!DOCTYPE html>
    <html lang="<?= $this->getLang(); ?>">

    <head>
        <meta charset="<?= $this->getCharset(); ?>"/>
        <title><?= $this->getPageTitle(); ?></title>

        <?php if ($this->getAllowIndex()): ?>
            <meta name="description" content="<?= $this->getMetaDescription(); ?>">
            <meta name="keywords" content="<?= $this->getMetaKeywords(); ?>">
        <?php else: ?>
            <meta name="robots" content="noindex">
        <?php endif; ?>

        <?= Html::csrfMetaTags() ?>
        <?php $this->head(); ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?= \Yii::$app->getRequest()->getBaseUrl(); ?>/favicon.ico" type="image/x-icon"/>
    </head>

    <body>

    <?php if ($this->getAllowAnalytic()): ?>
        <?= $this->render('//layouts/_analytics.php'); ?>
    <?php endif; ?>

    <?php $this->beginBody(); ?>

    <div class="wrap">
        <?= $this->render('_navbar'); ?>

        <div class="container">
            <?php if ($this->hasBread()): ?>
                <div class="row hidden-xs">
                    <div class="col-xs-12">
                        <?= Breadcrumbs::widget(['links' => $this->getBread()]) ?>
                    </div>
                </div>
            <?php endif; ?>

            <?= $content; ?>
        </div>
    </div>

    <footer class="footer padding-top-10 padding-bottom-15">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6"></div>
                <div class="col-sm-3 text-right">
                    <div class="line-height-16 margin-top-10">
                        <?= \Yii::$app->params['copyrightString']; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody(); ?>

    </body>

    </html>

<?php $this->endPage(); ?>