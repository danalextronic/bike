<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FoodRefreshments;

/**
 * FoodRefreshmentsSearch represents the model behind the search form about `app\models\FoodRefreshments`.
 */
class FoodRefreshmentsSearch extends FoodRefreshments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Food_Refreshments_ID'], 'integer'],
            [['Food_Refreshments', 'Food_Refreshments_Image'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = FoodRefreshments::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Food_Refreshments_ID' => $this->Food_Refreshments_ID,
        ]);

        $query->andFilterWhere(['like', 'Food_Refreshments', $this->Food_Refreshments])
            ->andFilterWhere(['like', 'Food_Refreshments_Image', $this->Food_Refreshments_Image]);

        return $dataProvider;
    }
}
