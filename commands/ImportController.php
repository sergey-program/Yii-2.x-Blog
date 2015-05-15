<?php

namespace app\commands;

use app\models\Category;
use app\models\Post;
use app\models\PostImage;
use yii\base\InvalidParamException;
use yii\console\Controller;

/**
 * Class ImportController
 *
 * @package app\commands
 */
class ImportController extends Controller
{
    /**
     * @param string $sUrl
     */
    public function actionByUrl($sUrl)
    {
        $aData = json_decode(file_get_contents($sUrl), true);

        $this->createCategories($aData);
    }

    /**
     * @param array $aCategoryArray
     */
    private function createCategories($aCategoryArray)
    {
        foreach ($aCategoryArray as $aCategory) {
            $this->createCategory($aCategory);
        }
    }

    /**
     * @param array $aCategory
     */
    private function createCategory($aCategory)
    {
        $mCategory = Category::find()->where(['title' => $aCategory['name']])->one();

        if (!$mCategory) {
            $mCategory = new Category();
            $mCategory->timeCreate = time();
            $mCategory->title = $aCategory['name'];
            $mCategory->status = ($aCategory['active']) ? Category::STATUS_HIDDEN : Category::STATUS_VISIBLE;

            if (!$mCategory->save()) {
                throw new InvalidParamException('Cannot save new Category.');
            }
        }

        if (isset($aCategory['news']) && is_array($aCategory['news'])) {
            $this->createPosts($aCategory['news'], $mCategory->id);
        }

        if (isset($aCategory['subcategories']) && is_array($aCategory['subcategories'])) {
            $this->createCategories($aCategory['subcategories']);
        }
    }

    /**
     * @param array $aPost
     * @param int   $iCategoryID
     *
     * @throws \Exception
     */
    private function createPosts($aPost, $iCategoryID)
    {
        foreach ($aPost as $aPostRow) {
            if (Post::findOne(['title' => $aPostRow['title']])) {
                continue; // means post exist
            }

            // upload image
            $aImagePathPart = explode('/', $aPostRow['image']);
            $sFileName = \Yii::$app->getSecurity()->generateRandomString(3) . '_' . $aImagePathPart[count($aImagePathPart) - 1];
            $sFilePath = FILE_PATH_ROOT_UPLOAD . $sFileName;

            try {
                $bCopied = copy($aPostRow['image'], $sFilePath);
            } catch (\Exception $oException) {
                $bCopied = false;
            }

            if (!$bCopied) { // post without image cannot exist
                continue;
            }

            // create new post
            $mPost = new Post();
            $mPost->timeCreate = strtotime($aPostRow['date']);
            $mPost->status = ($aPostRow['active']) ? Post::STATUS_VALIDATED : Post::STATUS_NEW;
            $mPost->title = $aPostRow['title'];
            $mPost->contentShort = $aPostRow['description'];
            $mPost->contentFull = $aPostRow['text'];
            $mPost->categoryID = $iCategoryID;

            if (!$mPost->save()) {
                continue;
            }

            // create new post image entry
            $mPostImage = new PostImage();
            $mPostImage->postID = $mPost->id;
            $mPostImage->fileName = $sFileName;
            $mPostImage->isPrimary = true;

            if (!$mPostImage->save()) {
                $mPost->delete(); // post cannot exist without image
                continue;
            }
        }
    }
}