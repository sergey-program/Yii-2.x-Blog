<?php

namespace app\modules\frontendProfile\models;

use app\validators\CurrentPasswordValidator;
use yii\base\Model;

/**
 * Class _formPasswordChange
 *
 * @package app\modules\profile\models
 */
class _formPasswordChange extends Model
{
    public $oldPassword;
    public $newPassword;
    public $newPasswordRepeat;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['oldPassword', 'newPassword', 'newPasswordRepeat'], 'required'],
            ['oldPassword', CurrentPasswordValidator::className()],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'oldPassword' => \Yii::t('', 'Current password'),
            'newPassword' => \Yii::t('', 'New password'),
            'newPasswordRepeat' => \Yii::t('', 'New password (repeat)')
        ];
    }

    /**
     * @return bool
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function changePassword()
    {
        $mUserIdentity = \Yii::$app->getUser()->getIdentity();
        /** @var \app\components\UserIdentity $mUserIdentity */
        $mUserIdentity->password = \Yii::$app->getSecurity()->generatePasswordHash($this->newPassword);

        if ($mUserIdentity->save()) {
            return true;
        }

        $this->addError('newPassword', 'Can not apply new password.');

        return false;
    }
}