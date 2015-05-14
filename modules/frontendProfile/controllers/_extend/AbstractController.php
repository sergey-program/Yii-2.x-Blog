<?php

namespace app\modules\frontendProfile\controllers\_extend;

use app\controllers\_extend\FrontendController;
use yii\filters\AccessControl;

/**
 * Class AbstractController
 *
 * @package app\modules\frontendProfile\controllers\_extend
 */
abstract class AbstractController extends FrontendController
{
    public $layout = 'main';

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'roles' => ['user']]
                ]
            ]
        ];
    }

    /**
     *
     */
    public function init()
    {
        parent::init();

        $this->getView()->addBread(['label' => \Yii::t('', 'Profile'), 'url' => ['index/index']]);
    }
}