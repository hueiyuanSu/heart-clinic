<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diseasetime;

/**
 * BannersSearch represents the model behind the search form about `app\models\Banners`.
 */
class DiseasetimeSearch extends Reserve
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','disease','weekdays'], 'integer'],
            [['time'], 'safe'],
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
        $query = Diseasetime::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'time' => $this->time,
            'disease' => $this->disease,
            'weekdays' => $this->weekdays,
        ]);


        return $dataProvider;
    }
}
