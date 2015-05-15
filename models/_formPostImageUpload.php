<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Class _formPostImageUpload
 *
 * @package app\models
 */
class _formPostImageUpload extends Model
{
    public $file;
    public $postID;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['file', 'postID'], 'required'],
            ['file', 'file']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'file' => \Yii::t('', 'File')
        ];
    }

    ### relations

    ### functions

    /**
     *
     */
    public function upload()
    {
        $bDone = false;
        $this->file = UploadedFile::getInstance($this, 'file');

        if ($this->validate()) {
            $this->deleteOld();

            $mPostImage = new PostImage();
            $mPostImage->postID = $this->postID;
            $mPostImage->fileName = \Yii::$app->getSecurity()->generateRandomString(3) . '_' . $this->file->baseName . '.' . $this->file->extension;
            $mPostImage->isPrimary = true;

            if ($this->checkUploadDir() && $mPostImage->save()) { // save new entry
                $bDone = $this->file->saveAs(FILE_PATH_ROOT_UPLOAD . $mPostImage->fileName); // copy image
            }

            if (!$bDone) { // on "image wasn't copied well"
                $mPostImage->delete(); // delete entry
            }
        }

        return $bDone;
    }

    /**
     * @throws \Exception
     */
    private function deleteOld()
    {
        $aPostImage = PostImage::findAll(['postID' => $this->postID]);

        // call each model to execute beforeDelete action
        foreach ($aPostImage as $mPostImage) {
            $mPostImage->delete();
        }
    }

    /**
     *
     */
    private function checkUploadDir()
    {
        $bResult = file_exists(FILE_PATH_ROOT_UPLOAD);

        if (!$bResult) {
            $bResult = mkdir(FILE_PATH_ROOT_UPLOAD, 0777, true);
        }

        return $bResult;
    }
}