<?php

namespace app\modules\backendNews\models;

use yii\base\Model;

class _searchPost //extends Post
{
    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($aParam)
    {
        $oQuery = '';
    }
}