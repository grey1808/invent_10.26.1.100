<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Technics;

/**
 * TechnicsSearch represents the model behind the search form of `app\modules\admin\models\Technics`.
 */
class TechnicsSearch extends Technics
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tech_group_id', 'category_id', 'firm_id', 'invent_number'], 'integer'],
            [['name', 'model', 'serial', 'comment'], 'safe'],
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
        $query = Technics::find()->where(['deleted' => 0]);

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
            'tech_group_id' => $this->tech_group_id,
            'category_id' => $this->getChildrenList($this->category_id),
            'firm_id' => $this->firm_id,
//            'invent_number' => $this->invent_number,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'invent_number', $this->invent_number])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
