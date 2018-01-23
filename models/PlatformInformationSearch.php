<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlatformInformation;

class PlatformInformationSearch extends PlatformInformation
{
    /**
     * @inheritdoc
     */
     public function rules()
     {
         return [
             [['id', 'employer_identification_number','factory_number','register_date','is_confirmed','is_access'], 'integer'],
             [['category','company','principal','address','phone','email','remark','writer','department','cellphone','fax','website','mem_number','content'], 'safe'],
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
     public function search($params, $front=null)
     {
         $query = PlatformInformation::find();

         // add conditions that should always apply here

         $dataProvider = new ActiveDataProvider([
             'query' => $query,
         ]);

         $this->load($params);

         if($front){
            $query->where( ['in', 'is_confirmed', 1] );
         }

         if (!$this->validate()) {
             // uncomment the following line if you do not want to return any records when validation fails
             // $query->where('0=1');
             return $dataProvider;
         }

         // grid filtering conditions
         $query->andFilterWhere([
            'id' => $this->id,
            'employer_identification_number' => $this->employer_identification_number,
            'factory_number' => $this->factory_number,
            'register_date' => $this->register_date,
            'is_confirmed' => $this->is_confirmed,
            'is_access'=>$this->is_access,
         ]);

         $query->andFilterWhere(['like', 'category', $this->category])
               ->andFilterWhere(['like','company',$this->company])
               ->andFilterWhere(['like','principal',$this->principal])
               ->andFilterWhere(['like','address',$this->address])
               ->andFilterWhere(['like','phone',$this->phone])
               ->andFilterWhere(['like','email',$this->email])
               ->andFilterWhere(['like','remark',$this->remark])
               ->andFilterWhere(['like','writer',$this->writer])
               ->andFilterWhere(['like','department',$this->department])
               ->andFilterWhere(['like','cellphone',$this->cellphone])
               ->andFilterWhere(['like','fax',$this->fax])
               ->andFilterWhere(['like','website',$this->website])
               ->andFilterWhere(['like','mem_number',$this->mem_number])
               ->andFilterWhere(['like','content',$this->content]);

         return $dataProvider;
     }


     public function searchPager($params=null,$status=true,$limit=30, $offset=0, $orderBy="created_at DESC")
    {
        $query = PlatformInformation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $limit,
                'page'=>$offset
            ],
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'employer_identification_number' => $this->employer_identification_number,
            'factory_number' => $this->factory_number,
            'register_date' => $this->register_date,
            'is_confirmed' => $this->is_confirmed,
            'is_access'=>$this->is_access,
         ]);

        $query->andFilterWhere(['like', 'category', $this->category])
               ->andFilterWhere(['like','company',$this->company])
               ->andFilterWhere(['like','principal',$this->principal])
               ->andFilterWhere(['like','address',$this->address])
               ->andFilterWhere(['like','phone',$this->phone])
               ->andFilterWhere(['like','email',$this->email])
               ->andFilterWhere(['like','remark',$this->remark])
               ->andFilterWhere(['like','writer',$this->writer])
               ->andFilterWhere(['like','department',$this->department])
               ->andFilterWhere(['like','cellphone',$this->cellphone])
               ->andFilterWhere(['like','fax',$this->fax])
               ->andFilterWhere(['like','website',$this->website])
               ->andFilterWhere(['like','mem_number',$this->mem_number])
               ->andFilterWhere(['like','content',$this->content]);

        $query->addOrderBy($orderBy);
        return $dataProvider;
    }

}
