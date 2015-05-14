<?php

namespace app\controllers;

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
        if (!$this->getUser()->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', ['model' => $model]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        $this->getUser()->logout();

        return $this->goHome();
    }
}