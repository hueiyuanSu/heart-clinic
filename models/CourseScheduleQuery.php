<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CourseSchedule]].
 *
 * @see CourseSchedule
 */
class CourseScheduleQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * @inheritdoc
     * @return CourseSchedule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CourseSchedule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
