<?php

namespace app\modules\backendNews\controllers\_extend;


use app\controllers\_extend\BackendController;
use yii\filters\AccessControl;

/**
 * Class AbstractController
 *
 * @package app\modules\backendNews\controllers\_extend
 */
abstract class AbstractController extends BackendController
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
                    ['allow' => true, 'roles' => ['admin']]
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

        $this->getView()->addBread(['label' => \Yii::t('', 'News'), 'url' => ['index/index']]);
    }
}