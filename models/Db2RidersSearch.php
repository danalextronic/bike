<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Db2Riders;

/**
 * Db2RidersSearch represents the model behind the search form about `app\models\Db2Riders`.
 */
class Db2RidersSearch extends Db2Riders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Rider_Name', 'RacerID', 'AMA_Num', 'Last_Update', 'Create_Date', 'Address', 'Address_2', 'City', 'State', 'Zip', 'Shirt_Size', 'MSF_Expiration', 'Email_Address', 'Phone_Number'], 'safe'],
            [['Client_ID', 'Count_Coupons_Issued', 'Count_First_Place', 'Count_Races_Completed', 'Stores_ID', 'Coupon_ID', 'Riders_ID', 'Coupon_Limit', 'Rider_Category_ID', 'Results_To_Process', 'Rider_Age', 'MSF_ID', 'Approved', 'Welcome_Packet_Sent'], 'integer'],
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
        $query = Db2Riders::find();

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
            'Client_ID' => $this->Client_ID,
            'Count_Coupons_Issued' => $this->Count_Coupons_Issued,
            'Count_First_Place' => $this->Count_First_Place,
            'Count_Races_Completed' => $this->Count_Races_Completed,
            'Stores_ID' => $this->Stores_ID,
            'Coupon_ID' => $this->Coupon_ID,
            'Last_Update' => $this->Last_Update,
            'Riders_ID' => $this->Riders_ID,
            'Coupon_Limit' => $this->Coupon_Limit,
            'Rider_Category_ID' => $this->Rider_Category_ID,
            'Create_Date' => $this->Create_Date,
            'Results_To_Process' => $this->Results_To_Process,
            'Rider_Age' => $this->Rider_Age,
            'MSF_ID' => $this->MSF_ID,
            'MSF_Expiration' => $this->MSF_Expiration,
            'Approved' => $this->Approved,
            'Welcome_Packet_Sent' => $this->Welcome_Packet_Sent,
        ]);

        $query->andFilterWhere(['like', 'Rider_Name', $this->Rider_Name])
            ->andFilterWhere(['like', 'RacerID', $this->RacerID])
            ->andFilterWhere(['like', 'AMA_Num', $this->AMA_Num])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'Address_2', $this->Address_2])
            ->andFilterWhere(['like', 'City', $this->City])
            ->andFilterWhere(['like', 'State', $this->State])
            ->andFilterWhere(['like', 'Zip', $this->Zip])
            ->andFilterWhere(['like', 'Shirt_Size', $this->Shirt_Size])
            ->andFilterWhere(['like', 'Email_Address', $this->Email_Address])
            ->andFilterWhere(['like', 'Phone_Number', $this->Phone_Number]);

        return $dataProvider;
    }
}
