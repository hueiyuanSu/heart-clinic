<?php

use yii\db\Migration;

class m170804_062718_add_order_method extends Migration
{
    public function safeUp()
    {
        $this->addColumn('orders', 'payment_method', "varchar(8)");
    }

    public function safeDown()
    {
        echo "m170804_062718_add_order_method has been reverted.\n";
        $this->dropColumn('orders', 'payment_method');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170804_062718_add_order_method cannot be reverted.\n";

        return false;
    }
    */
}
