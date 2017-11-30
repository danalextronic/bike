<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BikeEvents;

/**
 * BikeeventsSearch represents the model behind the search form about `app\models\BikeEvents`.
 */
class BikeeventsSearch extends BikeEvents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'eventTypeId', 'join_us_id', 'food_refreshments_id', 'give_away_id', 'in_store_deal_id', 'deals_id', 'is_archive'], 'integer'],
            [['event_template_titles', 'start_date', 'end_date', 'eventTime'], 'safe'],
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
        $query = BikeEvents::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate())
        {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if (Yii::$app->user->identity->userTypeId == Userinfo::MANAGER_USER_TYPE_ID) {

            $storeId = Yii::$app->user->identity->storeId;

            $event_ids = StoreBikeEvents::find()->select('bike_events_id')->asArray()->where(['store_id' => $storeId])->all();
            if ($event_ids) {
                $list_event_ids = [];

                foreach ($event_ids as $event_id) {
                    $list_event_ids[] = $event_id['bike_events_id'];
                }
                $query->andFilterWhere(['id' => $list_event_ids]);
            } else {
                $query->andFilterWhere(['id' => -1]);
            }
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'eventTime' => $this->eventTime,
            'eventTypeId' => $this->eventTypeId,
            'join_us_id' => $this->join_us_id,
            'food_refreshments_id' => $this->food_refreshments_id,
            'give_away_id' => $this->give_away_id,
            'in_store_deal_id' => $this->in_store_deal_id,
            'deals_id' => $this->deals_id,
            'is_archive' => $this->is_archive,
        ]);


        return $dataProvider;
    }
}
