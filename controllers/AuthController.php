<?php

namespace app\controllers;

use app\controllers\_extend\FrontendController;
use app\models\_formLogin;

/**
 * Class AuthController
 *
 * @package app\controllers
 */
class AuthController extends FrontendController
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        $this->getView()->addBread(['label' => \Yii::t('', 'Login')]);

        if (!$this->getUser()->isGuest) {
            return $this->goHome();
        }

        $fLogin = new _formLogin();

        if ($this->isPostRequest() && $fLogin->load($this->getPostData())) {
            if ($fLogin->login()) {
                return $this->goBack();
            }
        }

        return $this->render('login', ['fLogin' => $fLogin]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        $this->getUser()->logout(false);

        return $this->goBack();
    }
}