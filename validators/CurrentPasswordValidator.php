<?php

namespace app\validators;

use app\modules\frontendProfile\models\_formPasswordChange;
use yii\base\InvalidCallException;
use yii\validators\Validator;

/**
 * Class CurrentPasswordValidator
 *
 * @package app\validators
 */
class CurrentPasswordValidator extends Validator
{
    /**
     * @param \app\modules\frontendProfile\models\_formPasswordChange $mModel
     * @param string                                                  $sAttribute
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function validateAttribute($mModel, $sAttribute)
    {
        if (!($mModel instanceof _formPasswordChange)) {
            throw new InvalidCallException ('CurrentPasswordValidator can be used only with "_formPasswordChange" instance form.');
        }

        $oSecurity = \Yii::$app->getSecurity();
        $oUserIdentity = \Yii::$app->getUser()->getIdentity();
        /** @var \app\components\UserIdentity $oUserIdentity */

        if (!$oSecurity->validatePassword($mModel->oldPassword, $oUserIdentity->password)) {
            $this->addError($mModel, $sAttribute, \Yii::t('', 'Invalid password') . '.');
        }
    }
}