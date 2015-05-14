<?php

namespace app\controllers;

use app\controllers\_extend\FrontendController;
use app\models\Category;
use app\models\Post;
use yii\data\Pagination;

/**
 * Class CategoryController
 *
 * @package app\controllers
 */
class CategoryController extends FrontendController
{
    /**
     * @param int $id Category ID
     *
     * @return string
     */
    public function actionView($id)
    {
        $mCategory = Category::findOne($id);
        /** @var Category $mCategory */

        if (!$mCategory || $mCategory->status != Category::STATUS_VISIBLE) {
            return $this->render('view-not-exist');
        }

        $this->getView()
            ->addBread(['label' => $mCategory->title, 'url' => ['/category/view', 'id' => $mCategory->id]]);

        $oQuery = Post::find()
            ->where(['categoryID' => $mCategory->id, 'status' => Post::STATUS_VALIDATED])
            ->orderBy('timeCreate DESC');

        $oPagination = new Pagination(['totalCount' => $oQuery->count(), 'defaultPageSize' => \Yii::$app->params['postPerPage']['category']]);
        $aPost = $oQuery->offset($oPagination->offset)->limit($oPagination->limit)->all();

        return $this->render('view', ['mCategory' => $mCategory, 'aPost' => $aPost, 'oPagination' => $oPagination]);
    }
}