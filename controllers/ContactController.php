<?php

namespace app\controllers;

use app\controllers\_extend\FrontendController;

/**
 * Class ContactController
 *
 * @package app\controllers
 */
class ContactController extends FrontendController
{
    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        $model = new ContactForm();

        if ($model->load($this->getPostData()) && $model->contact(\Yii::$app->params['adminEmail'])) {
            $this->getSession()->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', ['model' => $model]);
    }
}