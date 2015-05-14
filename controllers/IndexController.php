<?php

namespace app\controllers;

use app\controllers\_extend\FrontendController;
use app\models\Category;
use app\models\Post;
use yii\data\Pagination;

/**
 * Class IndexController
 *
 * @package app\controllers
 */
class IndexController extends FrontendController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $aCategory = Category::find()->all();

        $oQuery = Post::find()->where(['status' => Post::STATUS_VALIDATED])->orderBy('timeCreate DESC');
        $oPagination = new Pagination(['totalCount' => $oQuery->count(), 'defaultPageSize' => \Yii::$app->params['postPerPage']['index']]);
        $aPost = $oQuery->offset($oPagination->offset)->limit($oPagination->limit)->all();

        return $this->render('index', ['aCategory' => $aCategory, 'aPost' => $aPost, 'oPagination' => $oPagination]);
    }
}