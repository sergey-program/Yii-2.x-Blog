<?php

namespace app\modules\backendNews\controllers\_extend;


use app\controllers\_extend\BackendController;
use app\models\Post;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * Class AbstractController
 *
 * @package app\modules\backendNews\controllers\_extend
 */
abstract class AbstractController extends BackendController
{
    public $layout = 'main';

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'roles' => ['admin']]
                ]
            ]
        ];
    }

    /**
     * @param int $id Post ID
     *
     * @return Post
     * @throws NotFoundHttpException
     */
    public function loadPost($id)
    {
        $mModel = Post::findOne($id);

        if (!$mModel) {
            throw new NotFoundHttpException('Post not found');
        }

        return $mModel;
    }
}