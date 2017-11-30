<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InStoreDeal;

/**
 * InStoreDealSearch represents the model behind the search form about `app\models\InStoreDeal`.
 */
class InStoreDealSearch extends InStoreDeal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['In_Store_Deal_ID'], 'integer'],
            [['In_Store_Deal', 'In_Store_Deal_Image'], 'safe'],
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
        $query = InStoreDeal::find();

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
            'In_Store_Deal_ID' => $this->In_Store_Deal_ID,
        ]);

        $query->andFilterWhere(['like', 'In_Store_Deal', $this->In_Store_Deal])
            ->andFilterWhere(['like', 'In_Store_Deal_Image', $this->In_Store_Deal_Image]);

        return $dataProvider;
    }
}
