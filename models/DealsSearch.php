<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Deals;

/**
 * DealsSearch represents the model behind the search form about `app\models\Deals`.
 */
class DealsSearch extends Deals
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Deals_ID', 'Join_US_ID'], 'integer'],
            [['Deal_Name'], 'safe'],
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
        $query = Deals::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['Deals_ID'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Deals_ID' => $this->Deals_ID,
            'Join_US_ID' => $this->Join_US_ID,
        ]);

        $query->andFilterWhere(['like', 'Deal_Name', $this->Deal_Name]);

        return $dataProvider;
    }
}
