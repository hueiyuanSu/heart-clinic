<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_meta_event".
 *
 * @property integer $id
 * @property integer $news_id
 * @property string $location
 * @property string $link
 * @property integer $event_time
 */
class NewsMetaEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_meta_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'event_time'], 'integer'],
            [['location'], 'string', 'max' => 128],
            [['link'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'news_id' => Yii::t('app', 'News ID'),
            'location' => Yii::t('app', 'Location'),
            'link' => Yii::t('app', 'Link'),
            'event_time' => Yii::t('app', 'Event Time'),
        ];
    }

    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }
}
