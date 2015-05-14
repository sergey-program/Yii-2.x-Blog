<?php

namespace app\modules\backendNewsCategories\controllers\_extend;

use app\controllers\_extend\BackendController;
use app\models\Category;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * Class AbstractController
 *
 * @package app\modules\backendNewsCategories\controllers\_extend
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
     * @param int $id
     *
     * @return Category
     * @throws NotFoundHttpException
     */
    public function loadCategory($id)
    {
        $mModel = Category::findOne($id);

        if (!$mModel) {
            throw new NotFoundHttpException('Category not found.');
        }

        return $mModel;
    }
}