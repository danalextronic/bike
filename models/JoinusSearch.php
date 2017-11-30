<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Joinus;

/**
 * JoinUsSearch represents the model behind the search form about `app\models\JoinUs`.
 */
class JoinusSearch extends Joinus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Join_US_ID'], 'integer'],
            [['Join_US', 'Join_US_Image'], 'safe'],
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
        $query = Joinus::find();

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
            'Join_US_ID' => $this->Join_US_ID,
        ]);

        $query->andFilterWhere(['like', 'Join_US', $this->Join_US])
            ->andFilterWhere(['like', 'Join_US_Image', $this->Join_US_Image]);

        return $dataProvider;
    }
}
