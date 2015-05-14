<?php

namespace app\models\_extend;

use yii\db\ActiveRecord;

/**
 * Class AbstractActiveRecord
 *
 * @package app\models\_extend
 */
abstract class AbstractActiveRecord extends ActiveRecord
{
    /**
     * @return string
     */
    protected function getSessionSalt()
    {
        return md5(static::className() . \Yii::$app->getUser()->getID());
    }

    /**
     * Save all current attributes to session with salt as prefix.
     */
    protected function sessionSaveAttributes()
    {
        foreach ($this->getAttributes() as $sKey => $sAttribute) {
            \Yii::$app->getSession()->set($this->getSessionSalt() . '_' . $sKey, $this->getAttribute($sKey));
        }
    }

    /**
     * Apply all attributes to model if they exist.
     */
    protected function sessionLoadAttributes()
    {
        foreach ($this->getAttributes() as $sKey => $sAttribute) {
            $this->setAttribute($sKey, \Yii::$app->getSession()->get($this->getSessionSalt() . '_' . $sKey));
        }
    }
}