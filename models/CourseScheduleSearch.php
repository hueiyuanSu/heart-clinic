<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CourseSchedule;

/**
 * CourseScheduleSearch represents the model behind the search form about `app\models\CourseSchedule`.
 */
class CourseScheduleSearch extends CourseSchedule
{
    public $category_id;
    public $searchKey;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'sorts', 'status', 'start_at', 'end_at', 'modified_at', 'created_at','category_id'], 'integer'],
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
        $query = CourseSchedule::find();

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
            'course_id' => $this->course_id,
            'sorts' => $this->sorts,
            'status' => $this->status,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'modified_at' => $this->modified_at,
            'created_at' => $this->created_at,
        ]);

        return $dataProvider;
    }

    public function searchPager($params=null,$limit=30, $offset=0, $orderBy="start_at DESC")
    {
        $query = CourseSchedule::find();

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
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('course');
        if($this->category_id){
            $query->andWhere(['courses.category_id'=>$this->category_id]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'course_id' => $this->course_id,
            'sorts' => $this->sorts,
            'status' => $this->status,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'modified_at' => $this->modified_at,
            'created_at' => $this->created_at,
        ]);
        $query->addOrderBy($orderBy);
        return $dataProvider;
    }
}
