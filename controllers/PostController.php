<?php

namespace app\controllers;

use app\controllers\_extend\FrontendController;
use app\models\Post;

/**
 * Class PostController
 *
 * @package app\controllers
 */
class PostController extends FrontendController
{
    /**
     * @param int $id Post ID
     *
     * @return string
     */
    public function actionView($id)
    {
        $mPost = Post::findOne($id);
        /** @var Post $mPost */

        if (!$mPost || $mPost->status != Post::STATUS_VALIDATED) {
            return $this->render('view-not-exist');
        }

        $this->getView()
            ->addBread(['label' => $mPost->category->title, 'url' => ['/category/view', 'id' => $mPost->category->id]])
            ->addBread(['label' => $mPost->title]);

        return $this->render('view', ['mPost' => $mPost]);
    }
}