<?php

namespace app\components;

use yii\web\User;

/**
 * Class UserExtended
 *
 * @package app\components
 */
class UserExtended extends User
{
    /**
     * @param string $sRole
     *
     * @return boolean
     */
    public function hasRole($sRole)
    {
        if ($this->isGuest) {
            return false;
        }

        return \Yii::$app->getAuthManager()->checkAccess($this->getID(), $sRole);
    }

    /**
     * @return string|null
     */
    public function getUsername()
    {
        if (!$this->isGuest) {
            $oUserIdentity = $this->getIdentity();
            /** @var UserIdentity $oUserIdentity */

            if ($oUserIdentity) {
                return $oUserIdentity->username;
            }
        }

        return null;
    }
}