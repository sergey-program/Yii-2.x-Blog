<?php

namespace app\models;

use app\models\_extend\AbstractActiveRecord;

/**
 * Class Category
 *
 * @package app\models
 *
 * @property int                $id
 * @property string             $title
 * @property string             $description
 * @property int                $status
 * @property int                $timeCreate
 *
 * @property \app\models\Post[] $posts
 */
class Category extends AbstractActiveRecord
{
    const STATUS_HIDDEN = 0;
    const STATUS_VISIBLE = 1;

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['description', 'safe'],
            [['title', 'status', 'timeCreate'], 'required']
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => \Yii::t('', 'Title'),
            'description' => \Yii::t('', 'Description'),
            'status' => \Yii::t('', 'Status'),
            'timeCreate' => \Yii::t('', 'Time create')
        ];
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function beforeDelete()
    {
        if ($this->posts) { // do not delete if own posts
            return false;
        }

        return parent::beforeDelete();
    }

    ### relations

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['categoryID' => 'id']);
    }

    ### functions

    /**
     * @return array
     */
    public static function getStatusesAsDropDown()
    {
        return [
            self::STATUS_HIDDEN => \Yii::t('', 'Hidden'),
            self::STATUS_VISIBLE => \Yii::t('', 'Visible')
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