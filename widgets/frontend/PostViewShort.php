<?php

namespace app\widgets\frontend;

use app\models\Post;
use yii\base\InvalidParamException;
use yii\base\Widget;

/**
 * Class PostViewShort
 *
 * @package app\widgets\frontend
 *
 * @property \app\models\Post $mPost
 */
class PostViewShort extends Widget
{
    public $mPost;

    /**
     * @return string|void
     */
    public function run()
    {
        if (!($this->mPost instanceof Post)) {
            throw new InvalidParamException('Invalid instance.');
        }

        return $this->render('post-view-short', ['mPost' => $this->mPost]);
    }
}

