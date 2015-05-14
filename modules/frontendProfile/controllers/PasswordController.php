<?php

namespace app\modules\frontendProfile\controllers;

use app\modules\frontendProfile\controllers\_extend\AbstractController;
use app\modules\frontendProfile\models\_formPasswordChange;

/**
 * Class PasswordController
 *
 * @package app\modules\frontendProfile\controllers
 */
class PasswordController extends AbstractController
{
    public $defaultAction = 'index';

    /**
     * @return string
     */
    public function actionIndex()
    {
        $this->getView()
            ->setPageTitle(\Yii::t('', 'Profile') . ' :: ' . \Yii::t('', 'Change password'))
            ->addBread(['label' => \Yii::t('', 'Change password')]);

        $fPasswordChange = new _formPasswordChange();

        if ($this->isPostRequest() && $fPasswordChange->load($this->getPostData())) {
            if ($fPasswordChange->validate() && $fPasswordChange->changePassword()) {
                $sMessage = $this->getView()->isLang('ru') ? 'Пароль сменён.' : 'Password was changed.';
                $this->getSession()->setFlash('flash_success', $sMessage);

                return $this->refresh();
            }
        }

        return $this->render('index', ['fPasswordChange' => $fPasswordChange]);
    }
}