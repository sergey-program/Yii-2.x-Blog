<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Url;

/**
 * @var \app\components\ViewExtended $this
 */
?>

<?php

NavBar::begin([
    'brandLabel' => \Yii::$app->name,
    'brandUrl' => \Yii::$app->getHomeUrl(),
    'options' => ['class' => 'navbar-default navbar-fixed-top']
]);

$aItems[] =
    '<form class="navbar-form navbar-left margin-left-15 margin-right-15" role="search" action="/search/execute" method="GET">
        <div class="input-group">
            <input type="text" name="string" class="form-control" placeholder="' . \Yii::t('', 'Product model') . '..." value="' . \Yii::$app->getRequest()->get('string', '') . '">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">' . \Yii::t('', 'Find') . '</button>
            </span>
        </div>
    </form>';

if ($this->getUser()->getIsGuest()) {
    $aItems[] = ['label' => \Yii::t('', 'Login'), 'url' => ['/auth/login']];
    $aItems[] = ['label' => \Yii::t('main', 'Register'), 'url' => ['/auth/register']];
} else {
    if ($this->getUser()->hasRole('seo')) {
        $aItems[] = [
            'label' => \Yii::t('', 'SEO'),
            'items' => [
                ['label' => \Yii::t('', 'Products'), 'url' => ['/backend-seo-products/index/index']],
                ['label' => \Yii::t('', 'Product categories'), 'url' => ['/backend-seo-product-categories/index/index']],
                ['label' => \Yii::t('', 'Product images'), 'url' => ['/backend-seo-product-images/index/index']],
                ['label' => \Yii::t('', 'Pages'), 'url' => ['/backend-seo-pages/index/index']],
                ['label' => \Yii::t('', 'Word scopes'), 'url' => ['/backend-seo-word-scopes/index/index']]
            ]
        ];
    }

    if ($this->getUser()->hasRole('admin')) {
        $aItems[] = [
            'label' => \Yii::t('', 'Admin'),
            'items' => [
                ['label' => \Yii::t('', 'Feedbacks'), 'url' => ['/backend-feedbacks/index/index']],
                ['label' => \Yii::t('', 'Users'), 'url' => ['/backend-users/index/index']],
                ['label' => \Yii::t('', 'Lures'), 'url' => ['/backend-lures/index/index']]
            ]
        ];
    }

    if ($this->getUser()->hasRole('content')) {
        $aItems[] = [
            'label' => \Yii::t('', 'Content'),
            'items' => [
                ['label' => \Yii::t('', 'Products'), 'url' => ['/backend-products/index/index']],
                ['label' => \Yii::t('', 'Product images'), 'url' => ['/backend-product-images/index/index']],
                ['label' => \Yii::t('', 'Product masks'), 'url' => ['/backend-product-masks/index/index']],
                ['label' => \Yii::t('', 'Product categories'), 'url' => ['/backend-product-categories/index/index']],
                ['label' => \Yii::t('', 'Product comments'), 'url' => ['/backend-product-comments/index/index']]
            ]
        ];
    }

    if ($this->getUser()->hasRole('store')) {
        $aItems[] = [
            'label' => \Yii::t('', 'Stores'),
            'items' => [
                ['label' => \Yii::t('', 'Stores'), 'url' => ['/backend-stores/index/index']]
            ]
        ];
    }

    $aItems[] = [
        'label' => $this->getUser()->getUsername(),
        'items' => [
            ['label' => \Yii::t('', 'Profile'), 'url' => ['/my-profile/index/index']],
            ['label' => \Yii::t('', 'My stores'), 'url' => Url::toRoute(['/my-stores/index/index'])],
            '<li role="presentation" class="divider"></li>',
            ['label' => \Yii::t('', 'Logout') . ' (' . $this->getUser()->getUsername() . ')', 'url' => ['/auth/logout']]
        ]
    ];
}

echo Nav::widget(['options' => ['class' => 'navbar-nav navbar-right'], 'items' => $aItems]);

NavBar::end();