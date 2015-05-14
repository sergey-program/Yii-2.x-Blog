<?php

namespace app\models;

use app\components\UserIdentity;
use yii\base\Model;

/**
 * Class _formLogin
 *
 * @package app\models
 *
 * @property string      $username
 * @property string      $password
 * @property int|boolean $rememberMe
 */
class _formLogin extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    //
    private $_mUserIdentity;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'filter', 'filter' => 'trim'],
            ['rememberMe', 'boolean'],
            ['password', 'ruleValidatePassword']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('', 'Username'),
            'password' => \Yii::t('', 'Password'),
            'rememberMe' => \Yii::t('', 'Remember me')
        ];
    }

    /**
     * @param string $sAttribute
     * @param array  $aParams
     */
    public function ruleValidatePassword($sAttribute, $aParams)
    {
        if (!$this->hasErrors()) {
            $mUserIdentity = $this->getUserIdentity();

            if (!$mUserIdentity || !$this->checkPassword($this->password, $mUserIdentity->password)) {
                $this->addError($sAttribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * @return boolean
     */
    public function login()
    {
        $mUserIdentity = $this->getUserIdentity();
        $oUser = \Yii::$app->getUser();

        if ($this->validate()) {
            if ($mUserIdentity->isConfirmed) {
                return $oUser->login($mUserIdentity, $this->getRememberTime());
            }

            $this->addError('username', \Yii::t('main', 'Account registered but not confirmed via email.'));
        }

        return false;
    }

    /**
     * @return UserIdentity|null
     */
    private function getUserIdentity()
    {
        if (!$this->_mUserIdentity) {
            $this->_mUserIdentity = UserIdentity::find()->where(['username' => $this->username])->orWhere(['email' => $this->username])->one();
        }

        return $this->_mUserIdentity;
    }

    /**
     * @return int
     */
    private function getRememberTime()
    {
        return $this->rememberMe ? 3600 * 24 * 30 : 0;
    }

    /**
     * @param string $sOriginalPassword
     * @param string $sHashedPassword
     *
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    private function checkPassword($sOriginalPassword, $sHashedPassword)
    {
        try {
            $bReturn = \Yii::$app->getSecurity()->validatePassword($sOriginalPassword, $sHashedPassword);
        } catch (\Exception $oException) {
            return false;
        }

        return $bReturn;
    }
}