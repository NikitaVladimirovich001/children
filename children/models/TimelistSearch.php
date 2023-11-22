<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Timelist;

/**
 * TimelistSearch represents the model behind the search form of `app\models\Timelist`.
 */
class TimelistSearch extends Timelist
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'circle_id', 'category_id'], 'integer'],
            [['data', 'time', 'den'], 'safe'],
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
        $query = Timelist::find();

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
            'circle_id' => $this->circle_id,
            'category_id' => $this->category_id,
            'data' => $this->data,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'den', $this->den]);

        return $dataProvider;
    }
}
