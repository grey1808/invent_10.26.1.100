<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Rdp;

/**
 * RdpSearch represents the model behind the search form of `app\modules\admin\models\Rdp`.
 */
class RdpSearch extends Rdp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'structure_id', 'technics_id'], 'integer'],
            [['name', 'ipaddress', 'comment'], 'safe'],
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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ipaddress', $this->ipaddress])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
