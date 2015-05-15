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

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        $bCanDelete = true;
        $sFilePath = FILE_PATH_ROOT_UPLOAD . $this->fileName;

        if (isset($sFilePath)) { // entry cannot exist without file
            $bCanDelete = unlink($sFilePath);
        }

        return ($bCanDelete) ? parent::beforeDelete() : false;
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
    /**
     * @return string
     */
    public function getSrc()
    {
        return '/uploads/' . $this->fileName;
    }
}