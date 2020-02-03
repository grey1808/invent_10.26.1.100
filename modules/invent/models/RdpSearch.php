<?php

namespace app\modules\invent\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\invent\models\Rdp;

/**
 * RdpSearch represents the model behind the search form of `app\modules\invent\models\Rdp`.
 */
class RdpSearch extends Rdp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'structure_id', 'technics_id', 'vipnet'], 'integer'],
            [['name', 'ipaddress', 'connect_id', 'connect_pass', 'vipnet_name', 'comment'], 'safe'],
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
        $query = Rdp::find();

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
            'structure_id' => $this->structure_id,
            'technics_id' => $this->technics_id,
            'vipnet' => $this->vipnet,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ipaddress', $this->ipaddress])
            ->andFilterWhere(['like', 'connect_id', $this->connect_id])
            ->andFilterWhere(['like', 'connect_pass', $this->connect_pass])
            ->andFilterWhere(['like', 'vipnet_name', $this->vipnet_name])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
