<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180123_094014_del_other_table
 */
class m180123_094014_del_other_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropTable('courses');
        $this->dropTable('course_schedule');
        $this->dropTable('media');
        $this->dropTable('news');
        $this->dropTable('news_meta_event');
        $this->dropTable('orders');
        $this->dropTable('order_course');
        $this->dropTable('order_item');
        $this->dropTable('platform_information');
        $this->dropTable('products');
        $this->dropTable('product_meta_mask');
        $this->dropTable('product_meta_oil');
        $this->dropTable('product_meta_soap');
        $this->dropTable('social_account');
        $this->dropTable('staticpage');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180123_094014_del_other_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180123_094014_del_other_table cannot be reverted.\n";

        return false;
    }
    */
}
