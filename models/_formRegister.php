<?php

namespace app\models;

use yii\base\Model;

/**
 * Class _formRegister
 *
 * @package app\models
 *
 * @property string $username
 * @property string $email
 * @property string $password
 */
class _formRegister extends Model
{
    public $username;
    public $email;
    public $password;
    public $passwordRepeat;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'filter', 'filter' => 'trim'],
            [['username', 'email'], 'required'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 3, 'max' => 255],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],
            [['password', 'passwordRepeat'], 'required'],
            [['password', 'passwordRepeat'], 'string', 'min' => 6, 'max' => 255],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('', 'Username'),
            'email' => \Yii::t('', 'Email'),
            'password' => \Yii::t('', 'Password'),
            'passwordRepeat' => \Yii::t('', 'Password repeat')
        ];
    }

    /**
     * @return User|bool
     */
    public function createUser()
    {
        if ($this->validate()) {
            $oSecurity = \Yii::$app->getSecurity();

            $mUser = new User();
            $mUser->username = $this->username;
            $mUser->password = $oSecurity->generatePasswordHash($this->password);
            $mUser->email = $this->email;
            $mUser->authKey = $oSecurity->generateRandomString();
            $mUser->isConfirmed = false;
            $mUser->confirmHash = $oSecurity->generateRandomString(250);

            if ($mUser->validate()) {
                try {
                    $this->sendMail($mUser);
                } catch (\Exception $oException) {
                    return false;
                }

                $mUser->save();

                $oAuthManager = \Yii::$app->getAuthManager();
                $oAuthManager->assign($oAuthManager->getRole('user'), $mUser->id);

                return $mUser;
            }
        }

        return false;
    }

    /**
     * @param User $mUser
     *
     * @throws \yii\base\InvalidConfigException
     */
    private function sendMail(User $mUser)
    {
//        $oMailbox = Mail::get('register');
//        $oTransport = Mail::createTransport($oMailbox);
//
//        $oMailer = new Mailer();
//        $oMailer->setTransport($oTransport);
//        $oMailer
//            ->compose('user-registered', ['mUser' => $mUser])
//            ->setFrom($oMailbox->getLogin())
//            ->setTo($mUser->email)
//            ->setSubject(\Yii::$app->name . ' ' . \Yii::t('', 'Register') . '.')
//            ->send();
    }
}