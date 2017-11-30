<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BikeNightTemplate;

/**
 * BikeNightTemplateSearch represents the model behind the search form about `app\models\BikeNightTemplate`.
 */
class BikeNightTemplateSearch extends BikeNightTemplate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Bike_Night_ID', 'Store_ID', 'Winter_Gear_Night', 'Skip', 'Cancelled', 'Deals_ID', 'Give_Away_ID', 'In_Store_Deal_ID', 'Vendor_Images_1', 'Vendor_Images_2', 'Vendor_Images_3', 'Vendor_Images_4', 'Vendor_Images_5', 'Vendor_Images_6', 'Vendor_Images_7', 'Vendor_Images_8', 'Vendor_Images_9', 'Vendor_Images_10', 'Join_US_ID', 'Rim_Strip_Toss', 'Helmet_Toss', 'Activities_1', 'Activities_2', 'Activities_3', 'Activities_4', 'Food_Refreshments', 'Now_Hiring', 'Special_Event', 'Event_Type_ID'], 'integer'],
            [['Date', 'Time', 'Vendor_1', 'Vendor_2', 'Vendor_3', 'Vendor_4', 'Vendor_5', 'Vendor_6', 'Vendor_7', 'Vendor_8', 'Vendor_9', 'Vendor_10', 'Vendor_11', 'Vendor_12', 'Vendor_13', 'Vendor_14', 'Vendor_15', 'Vendor_16', 'Vendor_17', 'Vendor_18', 'Vendor_19', 'Vendor_20', 'Combine', 'Combine_Pre', 'Activities_URL', 'Reschedule_Date_If_Cancelled', 'Activities3_URL', 'End_Date'], 'safe'],
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
        $query = BikeNightTemplate::find();

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
            'Bike_Night_ID' => $this->Bike_Night_ID,
            'Store_ID' => $this->Store_ID,
            'Date' => $this->Date,
            'Winter_Gear_Night' => $this->Winter_Gear_Night,
            'Skip' => $this->Skip,
            'Cancelled' => $this->Cancelled,
            'Deals_ID' => $this->Deals_ID,
            'Give_Away_ID' => $this->Give_Away_ID,
            'In_Store_Deal_ID' => $this->In_Store_Deal_ID,
            'Vendor_Images_1' => $this->Vendor_Images_1,
            'Vendor_Images_2' => $this->Vendor_Images_2,
            'Vendor_Images_3' => $this->Vendor_Images_3,
            'Vendor_Images_4' => $this->Vendor_Images_4,
            'Vendor_Images_5' => $this->Vendor_Images_5,
            'Vendor_Images_6' => $this->Vendor_Images_6,
            'Vendor_Images_7' => $this->Vendor_Images_7,
            'Vendor_Images_8' => $this->Vendor_Images_8,
            'Vendor_Images_9' => $this->Vendor_Images_9,
            'Vendor_Images_10' => $this->Vendor_Images_10,
            'Join_US_ID' => $this->Join_US_ID,
            'Rim_Strip_Toss' => $this->Rim_Strip_Toss,
            'Helmet_Toss' => $this->Helmet_Toss,
            'Activities_1' => $this->Activities_1,
            'Activities_2' => $this->Activities_2,
            'Activities_3' => $this->Activities_3,
            'Activities_4' => $this->Activities_4,
            'Food_Refreshments' => $this->Food_Refreshments,
            'Now_Hiring' => $this->Now_Hiring,
            'Reschedule_Date_If_Cancelled' => $this->Reschedule_Date_If_Cancelled,
            'Special_Event' => $this->Special_Event,
            'End_Date' => $this->End_Date,
            'Event_Type_ID' => $this->Event_Type_ID,
        ]);

        $query->andFilterWhere(['like', 'Time', $this->Time])
            ->andFilterWhere(['like', 'Vendor_1', $this->Vendor_1])
            ->andFilterWhere(['like', 'Vendor_2', $this->Vendor_2])
            ->andFilterWhere(['like', 'Vendor_3', $this->Vendor_3])
            ->andFilterWhere(['like', 'Vendor_4', $this->Vendor_4])
            ->andFilterWhere(['like', 'Vendor_5', $this->Vendor_5])
            ->andFilterWhere(['like', 'Vendor_6', $this->Vendor_6])
            ->andFilterWhere(['like', 'Vendor_7', $this->Vendor_7])
            ->andFilterWhere(['like', 'Vendor_8', $this->Vendor_8])
            ->andFilterWhere(['like', 'Vendor_9', $this->Vendor_9])
            ->andFilterWhere(['like', 'Vendor_10', $this->Vendor_10])
            ->andFilterWhere(['like', 'Vendor_11', $this->Vendor_11])
            ->andFilterWhere(['like', 'Vendor_12', $this->Vendor_12])
            ->andFilterWhere(['like', 'Vendor_13', $this->Vendor_13])
            ->andFilterWhere(['like', 'Vendor_14', $this->Vendor_14])
            ->andFilterWhere(['like', 'Vendor_15', $this->Vendor_15])
            ->andFilterWhere(['like', 'Vendor_16', $this->Vendor_16])
            ->andFilterWhere(['like', 'Vendor_17', $this->Vendor_17])
            ->andFilterWhere(['like', 'Vendor_18', $this->Vendor_18])
            ->andFilterWhere(['like', 'Vendor_19', $this->Vendor_19])
            ->andFilterWhere(['like', 'Vendor_20', $this->Vendor_20])
            ->andFilterWhere(['like', 'Combine', $this->Combine])
            ->andFilterWhere(['like', 'Combine_Pre', $this->Combine_Pre])
            ->andFilterWhere(['like', 'Activities_URL', $this->Activities_URL])
            ->andFilterWhere(['like', 'Activities3_URL', $this->Activities3_URL]);

        return $dataProvider;
    }
}
