<?php

namespace app\modules\backendNews\models;

use app\models\Post;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class _searchPost
 *
 * @package app\modules\backendNews\models
 */
class _searchPost extends Post
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'title', 'status'], 'safe']
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param array $aParam
     *
     * @return ActiveDataProvider
     */
    public function search($aParam)
    {
        $oQuery = Post::find();
        $oDataProvider = new ActiveDataProvider(['query' => $oQuery]);

        if (!$this->load($aParam) && !$this->validate()) {
            return $oDataProvider;
        }

        $oQuery
            ->andFilterWhere(['id' => $this->id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['status' => $this->status]);

        return $oDataProvider;
    }
}