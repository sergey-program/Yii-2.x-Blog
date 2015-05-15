<?php

namespace app\modules\backendNews\controllers;

use app\models\_formPostImageUpload;
use app\models\Post;
use app\modules\backendNews\controllers\_extend\AbstractController;
use app\modules\backendNews\models\_searchPost;

/**
 * Class PostController
 *
 * @package app\modules\backendNews\controllers
 */
class PostController extends AbstractController
{
    /**
     * @return string
     */
    public function actionList()
    {
        $mSearchPost = new _searchPost();

        return $this->render('list', ['mSearchPost' => $mSearchPost]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $mPost = new Post();

        if ($this->isPostRequest() && $mPost->load($this->getPostData())) {
            $mPost->timeCreate = time();
            $mPost->status = Post::STATUS_NEW;
            $mPost->userID = $this->getUser()->getID();

            if ($mPost->save()) {
                return $this->redirect(['post/view', 'id' => $mPost->id]);
            }
        }

        return $this->render('create', ['mPost' => $mPost]);
    }

    /**
     * @param int $id
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($id)
    {
        $mPost = $this->loadPost($id);

        return $this->render('view', ['mPost' => $mPost]);
    }

    /**
     * @param int $id
     *
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $mPost = $this->loadPost($id);
        $fPostImageUpload = new _formPostImageUpload();
        $fPostImageUpload->postID = $id;

        if ($this->isPostRequest() && $mPost->load($this->getPostData())) {
            if ($mPost->save()) {
                return $this->redirect(['post/view', 'id' => $mPost->id]);
            }
        }

        if ($this->isPostRequest() && $fPostImageUpload->load($this->getPostData())) {
            if ($fPostImageUpload->upload()) {
                return $this->redirect(['post/view', 'id' => $mPost->id]);
            }
        }

        return $this->render('update', ['mPost' => $mPost, 'fPostImageUpload' => $fPostImageUpload]);
    }

    /**
     * @param int $id
     *
     * @return \yii\web\Response
     * @throws \Exception
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $mPost = $this->loadPost($id);

        if (!$mPost->delete()) { // cannot delete for some reasons
            return $this->redirect(['post/view', 'id' => $mPost->id]);
        }

        return $this->redirect(['post/list']);
    }
}