<?php

namespace app\models;

use app\models\_extend\AbstractActiveRecord;
use yii\web\User;

/**
 * Class Post
 *
 * @package app\models
 *
 * @property int              $id
 * @property int              $userID
 * @property string           $title
 * @property string           $contentFull
 * @property string           $contentShort
 * @property int              $timeCreate
 * @property int              $status
 *
 * @property \app\models\User $user
 */
class Post extends AbstractActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_BLOCKED = 2;

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['userID', 'title', 'contentFull', 'contentShort', 'timeCreate', 'status'], 'required']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => \Yii::t('', 'User'),
            'userID' => \Yii::t('', 'User ID'),
            'title' => \Yii::t('', 'Title'),
            'contentFull' => \Yii::t('', 'Content full'),
            'contentShort' => \Yii::t('', 'Content short'),
            'timeCreate' => \Yii::t('', 'Time create'),
            'status' => \Yii::t('', 'Status')
        ];
    }

    ### relations

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userID']);
    }

    ### functions

    /**
     * @return array
     */
    public static function getStatusesAsDropDown()
    {
        return [
            self::STATUS_NEW => \Yii::t('', 'New'),
            self::STATUS_VALIDATED => \Yii::t('', 'Validated'),
            self::STATUS_BLOCKED => \Yii::t('', 'Blocked'),
        ];
    }

    /**
     * @param int $iStatus
     *
     * @return string
     */
    public static function getStatusLabel($iStatus)
    {
        $aStatus = self::getStatusesAsDropDown();

        if (isset($aStatus[$iStatus])) {
            return $aStatus[$iStatus];
        }

        return \Yii::t('', 'Unknown');
    }
}
