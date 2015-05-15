<?php

namespace app\models;

use app\models\_extend\AbstractActiveRecord;

/**
 * Class PostImage
 *
 * @package app\models
 *
 * @property int      $id
 * @property int      $postID
 * @property string   $fileName
 * @property int|bool $isPrimary
 *
 * @property Post     $post
 */
class PostImage extends AbstractActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'post_image';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['postID', 'fileName', 'isPrimary'], 'required']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return ['id' => 'ID'];
    }

    ### relations

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'postID']);
    }

    ### functions
}