<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrderCourse]].
 *
 * @see OrderCourse
 */
class OrderCourseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OrderCourse[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrderCourse|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
