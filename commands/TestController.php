<?php

namespace app\commands;

use app\models\Category;
use app\models\Post;
use app\models\User;
use yii\console\Controller;

/**
 * Class TestController
 *
 * @package app\commands
 */
class TestController extends Controller
{
    /**
     * Create categories for tests.
     */
    public function actionGenerateCategories()
    {
        $oSecurity = \Yii::$app->getSecurity();

        for ($i = 1; $i <= 7; $i++) {
            $mCategory = new Category();
            $mCategory->timeCreate = time();
            $mCategory->title = 'test_' . $oSecurity->generateRandomString(3);
            $mCategory->description = $oSecurity->generateRandomString(5);
            $mCategory->status = Category::STATUS_VISIBLE;

            if (!$mCategory->save()) {
                break;
            }
        }
    }

    /**
     * Delete categories for tests.
     */
    public function actionClearCategories()
    {
        $aCategory = Category::findAll(['like', 'title', 'test_']);

        foreach ($aCategory as $mCategory) { // call beforeDelete action in each model
            $mCategory->delete();
        }
    }

    /**
     * Create posts for tests.
     */
    public function actionGeneratePosts()
    {
        $oSecurity = \Yii::$app->getSecurity();

        $mUser = User::find()->one();
        /** @var User $mUser */
        $mCategory = Category::find()->one();
        /** @var Category $mCategory */

        for ($i = 1; $i <= 10; $i++) {
            $mPost = new Post();
            $mPost->timeCreate = time();
            $mPost->userID = $mUser->id;
            $mPost->title = 'postTest_' . $oSecurity->generateRandomString(3);
            $mPost->contentFull = implode(' ', json_decode(file_get_contents('http://baconipsum.com/api/?type=all-meat&paras=3')));
            $mPost->contentShort = implode(' ', json_decode(file_get_contents('http://baconipsum.com/api/?type=all-meat&paras=3')));
            $mPost->status = Post::STATUS_VALIDATED;
            $mPost->categoryID = $mCategory->id;

            if (!$mPost->save()) {
                break;
            }
        }
    }

    /**
     * Delete all test posts.
     */
    public function actionClearPosts()
    {
        Post::deleteAll(['like', 'title', 'postTest_']);
    }
}