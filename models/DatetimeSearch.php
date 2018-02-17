<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Datetime;

/**
 * BannersSearch represents the model behind the search form about `app\models\Banners`.
 */
class DatetimeSearch extends Datetime
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','date','time','is_selected','disease_id'], 'integer'],
            [['weekdays'], 'safe'],
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
        $query = Datetime::find();

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
            'date' => $this->date,
            'time' => $this->time,
            'is_selected' => $this->is_selected,
            'disease_id' => $this->disease_id,
        ]);

        $query->andFilterWhere(['like', 'weekdays', $this->weekdays]);


        return $dataProvider;
    }
}
