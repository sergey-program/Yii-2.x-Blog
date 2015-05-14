<?php

namespace app\controllers\_extend;

use yii\web\Controller;

/**
 * Class AbstractController
 *
 * @package app\controllers
 */
abstract class AbstractController extends Controller
{
    /**
     *
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return \yii\web\User
     */
    public function getUser()
    {
        return \Yii::$app->getUser();
    }

    /**
     * @return \yii\web\Session
     */
    public function getSession()
    {
        return \Yii::$app->getSession();
    }

    /**
     * @param null|string $sVarName
     * @param null|string $sDefault
     *
     * @return mixed
     */
    public function getPostData($sVarName = null, $sDefault = null)
    {
        return \Yii::$app->getRequest()->post($sVarName, $sDefault);
    }

    /**
     * @param null|string $sVarName
     * @param null|string $sDefault
     *
     * @return mixed
     */
    public function getGetData($sVarName = null, $sDefault = null)
    {
        return \Yii::$app->getRequest()->get($sVarName, $sDefault);
    }

    /**
     * @return bool
     */
    public function isPostRequest()
    {
        return \Yii::$app->getRequest()->isPost;
    }

    /**
     * @return bool
     */
    public function isAjaxRequest()
    {
        return \Yii::$app->getRequest()->isAjax;
    }
}