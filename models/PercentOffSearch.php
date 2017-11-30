<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PercentOff;

/**
 * PercentOffSearch represents the model behind the search form about `app\models\PercentOff`.
 */
class PercentOffSearch extends PercentOff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Percent_Off_ID'], 'integer'],
            [['Percent_Off', 'Percent_Off_Image'], 'safe'],
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
        $query = PercentOff::find();

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
            'Percent_Off_ID' => $this->Percent_Off_ID,
        ]);

        $query->andFilterWhere(['like', 'Percent_Off', $this->Percent_Off])
            ->andFilterWhere(['like', 'Percent_Off_Image', $this->Percent_Off_Image]);

        return $dataProvider;
    }
}
