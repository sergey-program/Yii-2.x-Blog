<?php

namespace app\commands;

use yii\console\Controller;
use app\models\User;

/**
 * RB Access Control
 *
 * Class RbacController
 *
 * @package app\commands
 */
class RbacController extends Controller
{
    /**
     *
     */
    public function actionInit()
    {
        // clear old
        $oAuthManager = \Yii::$app->getAuthManager();
        $oAuthManager->removeAll();

        // user
        $oRoleUser = $oAuthManager->createRole('user');
        $oRoleUser->description = 'Registered user.';
        $oAuthManager->add($oRoleUser);

        // admin
        $oRoleAdmin = $oAuthManager->createRole('admin');
        $oRoleAdmin->description = 'Administrator.';
        $oAuthManager->add($oRoleAdmin);
        $oAuthManager->addChild($oRoleAdmin, $oRoleUser);

        // create default users
        $aDefaultUser = \Yii::$app->params['defaultUsers'];
        $oSecurity = \Yii::$app->getSecurity();

        foreach ($aDefaultUser as $aUserData) {
            $mUser = User::findOne(['username' => $aUserData['username']]);

            if (!$mUser) {
                $mUser = new User();
                $mUser->username = $aUserData['username'];
            }

            $mUser->password = $oSecurity->generatePasswordHash($aUserData['password']);
            $mUser->email = $aUserData['email'];
            $mUser->authKey = $oSecurity->generateRandomString();
            $mUser->isConfirmed = true;

            if ($mUser->save()) {
                $oAuthManager->assign($oAuthManager->getRole($aUserData['role']), $mUser->id);
            }
        }
    }
}