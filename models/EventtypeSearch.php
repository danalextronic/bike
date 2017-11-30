<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventType;

/**
 * EventtypeSearch represents the model behind the search form about `app\models\EventType`.
 */
class EventtypeSearch extends EventType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Event_Type_ID', 'Address_info'], 'integer'],
            [['Event_Type'], 'safe'],
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
        $query = EventType::find();

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
            'Event_Type_ID' => $this->Event_Type_ID,
            'Address_info' => $this->Address_info,
        ]);

        $query->andFilterWhere(['like', 'Event_Type', $this->Event_Type]);

        return $dataProvider;
    }
}
