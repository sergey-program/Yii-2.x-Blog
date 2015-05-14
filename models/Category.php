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
            'id' => 'ID'
        ];
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
}