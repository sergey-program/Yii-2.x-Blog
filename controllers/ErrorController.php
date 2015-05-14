<?php

namespace app\controllers;

use app\controllers\_extend\FrontendController;

/**
 * Class ErrorController
 *
 * @package app\controllers
 */
class ErrorController extends FrontendController
{
    private $sDefaultName;
    private $sDefaultMessage;

    /**
     *
     */
    public function init()
    {
        parent::init();

        $this->sDefaultName = 'Error';
        $this->sDefaultMessage = 'An internal server error occurred.';
    }

    /**
     * Copied from 'yii\web\ErrorAction'
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!YII_ENV_PROD || $this->getUser()->hasRole('admin')) {
            $oException = \Yii::$app->getErrorHandler()->exception;

            if ($oException === null) {
                return '';
            }

            $sCode = ($oException instanceof HttpException) ? $oException->statusCode : $oException->getCode();
            $sName = ($oException instanceof Exception) ? $oException->getName() : $this->_sDefaultName;
            $sMessage = ($oException instanceof UserException) ? $oException->getMessage() : $this->_sDefaultMessage;
            $sName .= ($sCode) ? ' (#' . $sCode . ')' : '';

            if ($this->isAjaxRequest()) {
                return $sName . ' : ' . $sMessage;
            }

            $this->getView()->setPageTitle($sName)->addBread(\Yii::t('', 'Error'));

            return $this->render('index', ['sName' => $sName, 'sMessage' => $sMessage, 'oException' => $oException]);
        }
    }
}