<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reserve;

/**
 * BannersSearch represents the model behind the search form about `app\models\Banners`.
 */
class ReserveSearch extends Reserve
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reserve_number', 'reserve_date','reserve_time', 'create_date', 'update_date'], 'integer'],
            [['patient_name','patient_phone','remark','disease'], 'safe'],
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
    public function search($params,$date=null)
    {
        $query = Reserve::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['reserve_date'=>SORT_DESC,'reserve_time'=>SORT_DESC]],
        ]);

        if($date){
            $query->andFilterWhere(['reserve_date'=>strtotime($date)]);
            $query->orderBy(['reserve_time'=>DESC]);
        }

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'reserve_number' => $this->reserve_number,
            'reserve_date' => $this->reserve_date,
            'reserve_time' => $this->reserve_time,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'patient_name', $this->patient_name])
            ->andFilterWhere(['like', 'patient_phone', $this->patient_phone])
            ->andFilterWhere(['like', 'disease', $this->disease])
            ->andFilterWhere(['like', 'remark', $this->remark]);


        return $dataProvider;
    }
}
