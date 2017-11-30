<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activities;

/**
 * ActivitiesSearch represents the model behind the search form about `app\models\Activities`.
 */
class ActivitiesSearch extends Activities
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Activities_ID'], 'integer'],
            [['Activities', 'Activities_Image', 'Hyperlink'], 'safe'],
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
        $query = Activities::find();

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
            'Activities_ID' => $this->Activities_ID,
        ]);

        $query->andFilterWhere(['like', 'Activities', $this->Activities])
            ->andFilterWhere(['like', 'Activities_Image', $this->Activities_Image])
            ->andFilterWhere(['like', 'Hyperlink', $this->Hyperlink]);

        return $dataProvider;
    }
}
