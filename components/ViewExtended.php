<?php

namespace app\components;

use yii\web\View;

/**
 * Class ViewExtended
 *
 * @package app\components
 *
 * @property array  $aBread
 * @property bool   $bAllowIndex
 * @property string $sMetaKeywords
 * @property string $sMetaDescription
 */
class ViewExtended extends View
{
    private $aBread;
    private $bAllowIndex = false;
    private $bAllowAnalytic = false;
    private $sMetaKeywords;
    private $sMetaDescription;

    /**
     * Set default page title.
     */
    public function init()
    {
        parent::init();

        $this->setPageTitle(\Yii::$app->name);
    }

    /**
     * @param string $sTitle
     *
     * @return $this
     */
    public function setPageTitle($sTitle)
    {
        $this->title = $sTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getPageTitle()
    {
        return $this->title;
    }

    /**
     * @param array|string $aBread
     *
     * @return $this
     */
    public function addBread($aBread)
    {
        $this->aBread[] = $aBread;

        return $this;
    }

    /**
     * @param array $aBread
     *
     * @return $this
     */
    public function setBread(array $aBread)
    {
        $this->aBread = $aBread;

        return $this;
    }

    /**
     * @return null|array
     */
    public function getBread()
    {
        if ($this->hasBread()) {
            return $this->aBread;
        }

        return null;
    }

    /**
     * @return bool
     */
    public function hasBread()
    {
        return is_array($this->aBread);
    }

    /**
     * @return \yii\web\Session
     */
    public function getSession()
    {
        return \Yii::$app->getSession();
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return \Yii::$app->language;
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return \Yii::$app->charset;
    }

    /**
     * @param string $sLang
     *
     * @return bool
     */
    public function isLang($sLang)
    {
        $sLang = $sLang == 'ru' ? 'ru-RU' : $sLang;
        $sLang = $sLang == 'en' ? 'en-US' : $sLang;

        return ($this->getLang() == $sLang);
    }

    /**
     * @return \yii\web\User|\app\components\UserExtended
     */
    public function getUser()
    {
        return \Yii::$app->getUser();
    }

    /**
     * @param boolean $bAllowIndex
     *
     * @return $this
     */
    public function setAllowIndex($bAllowIndex)
    {
        $this->bAllowIndex = $bAllowIndex;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAllowIndex()
    {
        return $this->bAllowIndex;
    }

    /**
     * @param bool $bAllowAnalytic
     *
     * @return $this
     */
    public function setAllowAnalytic($bAllowAnalytic)
    {
        $this->bAllowAnalytic = $bAllowAnalytic;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAllowAnalytic()
    {
        return $this->bAllowAnalytic;
    }

    /**
     * @param string $sKeywords
     *
     * @return $this
     */
    public function setMetaKeywords($sKeywords)
    {
        $this->sMetaKeywords = $sKeywords;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaKeywords()
    {
        return $this->sMetaKeywords;
    }

    /**
     * @param string $sDescription
     *
     * @return $this
     */
    public function setMetaDescription($sDescription)
    {
        $this->sMetaDescription = $sDescription;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaDescription()
    {
        return $this->sMetaDescription;
    }
}