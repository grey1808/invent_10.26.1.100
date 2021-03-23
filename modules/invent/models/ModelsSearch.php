<?php

namespace app\modules\invent\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\invent\models\Models;

/**
 * ModelsSearch represents the model behind the search form of `app\modules\invent\models\Models`.
 */
class ModelsSearch extends Models
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'firm_id'], 'integer'],
            [['comment', 'name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Models::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'firm_id' => $this->firm_id,
            'name' => $this->name,
            'comment' => $this->comment,
        ]);

        return $dataProvider;
    }
}
