<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DealBrand;

/**
 * DealsBrandSearch represents the model behind the search form about `app\models\DealBrand`.
 */
class DealsBrandSearch extends DealBrand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Deal_Brand_ID'], 'integer'],
            [['Deal_Brand', 'Deal_Brand_Image'], 'safe'],
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
        $query = DealBrand::find();

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
            'Deal_Brand_ID' => $this->Deal_Brand_ID,
        ]);

        $query->andFilterWhere(['like', 'Deal_Brand', $this->Deal_Brand])
            ->andFilterWhere(['like', 'Deal_Brand_Image', $this->Deal_Brand_Image]);

        return $dataProvider;
    }
}
