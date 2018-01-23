<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Banners]].
 *
 * @see Banners
 */
class BannersQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    public function online()
    {
        return $this->andWhere('[[status]]=1')->andWhere('[[start_at]]<'.time())->andWhere('[[end_at]]>'.time());
    }

    /**
     * @inheritdoc
     * @return Banners[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Banners|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
