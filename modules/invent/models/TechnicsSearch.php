<?php

namespace app\modules\invent\models;

use app\modules\invent\models\Technics;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * TechnicsSearch represents the model behind the search form of `app\modules\invent\models\Technics`.
 */
class TechnicsSearch extends Technics
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tech_group_id', 'firm_id', 'invent_number', 'model_id'], 'integer'],
            [['name', 'model', 'serial', 'params', 'comment', 'category_id','parent_id'], 'safe'],
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
    public function search($params,$category_id)
    {
        $query = Technics::find()->where(['deleted' => 0]);

//        if (!$category_id){
//            $query = Technics::find();
//        }else{
////            $query = Technics::find()->where(['category_id'=>$category_id]);
//            $query = Technics::find()->andFilterWhere(['category_id', $this->getParentList($this->category_id)]);
//        }



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

        if (isset($category_id)){
            $this->category_id = $category_id;
        }
        $request = Yii::$app->request->get('TechnicsSearch');
//        if ($request){
//            $this->category_id = $request['category_id'];
//        }


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tech_group_id' => $this->tech_group_id,
            'category_id' => $this->getChildrenList($this->category_id),
//            'category_id' => $this->getParentList($category_id),
            'firm_id' => $this->firm_id,
            'model_id' => $this->model_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'invent_number', $this->invent_number])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'params', $this->params])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
