<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Member;

class MemberSearch extends Member
{
    /**
     * @inheritdoc
     */
     public function rules()
     {
         return [
             [['id', 'birth_date','account_number','useful_date','sex','is_stop','valitate_number'], 'integer'],
             [['member_number','name','ssid','bank','branch_bank','email','address','phone','password','account','contact_address'], 'safe'],
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
     public function search()
     {
         $query = Member::find()->where(['access'=>1]);

         // add conditions that should always apply here

         $dataProvider = new ActiveDataProvider([
             'query' => $query,
         ]);

         //$this->load($params);

         if (!$this->validate()) {
             return $dataProvider;
         }

         // grid filtering conditions
         $query->andFilterWhere([
             'id' => $this->id,
             'birth_date' => $this->birth_date,
             'account_number' => $this->account_number,
             'useful_date' => $this->useful_date,
             'sex' => $this->sex,
             'is_stop' => $this->is_stop,
             'valitate_number' => $thiss->valitate_number,
         ]);

         $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'member_number', $this->member_number])
                ->andFilterWhere(['like', 'ssid', $this->ssid])
                ->andFilterWhere(['like', 'bank', $this->bank])
                ->andFilterWhere(['like', 'branch_bank', $this->branch_bank])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'password',$this->password])
                ->andFilterWhere(['like','contact_address',$this->contact_address])
                ->andFilterWhere(['like','account',$this->account]);

         return $dataProvider;
     }

}
