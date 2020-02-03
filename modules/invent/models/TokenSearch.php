<?php

namespace app\modules\invent\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\invent\models\Token;

/**
 * TokenSearch represents the model behind the search form of `app\modules\invent\models\Token`.
 */
class TokenSearch extends Token
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'token_group_id', 'user_id'], 'integer'],
            [['fullname', 'startdate', 'enddate', 'token_nubmer', 'comment'], 'safe'],
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
        $query = Token::find();

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
            'token_group_id' => $this->token_group_id,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'token_nubmer', $this->token_nubmer])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
