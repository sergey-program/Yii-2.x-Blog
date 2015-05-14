<?php

namespace app\modules\backendNewsCategories\models;

use app\models\Category;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class _searchCategory
 *
 * @package app\modules\backendNewsCategories\models
 */
class _searchCategory extends Category
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
        $oQuery = Category::find();
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