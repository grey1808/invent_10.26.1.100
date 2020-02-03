<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Location;

/**
 * LocationSearch represents the model behind the search form of `app\modules\admin\models\Location`.
 */
class LocationSearch extends Location
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'structure_id', 'technics_id', 'programs_id', 'invent_number', 'update_datetime', 'user_id'], 'integer'],
            [['create_datetime'], 'safe'],
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
        $query = Location::find();

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
            'programs_id' => $this->programs_id,
            'invent_number' => $this->invent_number,
            'create_datetime' => $this->create_datetime,
            'update_datetime' => $this->update_datetime,
            'user_id' => $this->user_id,
        ]);

        return $dataProvider;
    }
}
