<?php

namespace app\modules\backendNewsCategories\controllers;

use app\models\Category;
use app\modules\backendNewsCategories\controllers\_extend\AbstractController;
use app\modules\backendNewsCategories\models\_searchCategory;

/**
 * Class IndexController
 *
 * @package app\modules\backendNewsCategories\controllers
 */
class CategoryController extends AbstractController
{
    /**
     * @return \yii\web\Response
     */
    public function actionList()
    {
        $mSearchCategory = new _searchCategory();

        return $this->render('list', ['mSearchCategory' => $mSearchCategory]);
    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        $mCategory = new Category();

        if ($this->isPostRequest() && $mCategory->load($this->getPostData())) {
            $mCategory->timeCreate = time();

            if ($mCategory->save()) {
                return $this->redirect(['category/view', 'id' => $mCategory->id]);
            }
        }

        return $this->render('create', ['mCategory' => $mCategory]);
    }

    /**
     * @param int $id Category ID
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($id)
    {
        $mCategory = $this->loadCategory($id);

        return $this->render('view', ['mCategory' => $mCategory]);
    }

    /**
     * @param int $id Category ID
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $mCategory = $this->loadCategory($id);

        if ($this->isPostRequest() && $mCategory->load($this->getPostData())) {
            if ($mCategory->save()) {
                return $this->redirect(['category/view', 'id' => $mCategory->id]);
            }
        }

        return $this->render('update', ['mCategory' => $mCategory]);
    }

    /**
     * @param int $id Category ID
     *
     * @return \yii\web\Response
     * @throws \Exception
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $mCategory = $this->loadCategory($id);

        if (!$mCategory->delete()) {
            return $this->redirect(['category/view', 'id' => $mCategory->id]);
        }

        return $this->redirect(['category/list']);
    }
}