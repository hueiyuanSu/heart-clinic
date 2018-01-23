<?php

use yii\db\Migration;

class m170804_072036_add_order_column extends Migration
{
    public function safeUp()
    {
        $this->addColumn('orders', 'payment_time', "int(11)");
        $this->addColumn('orders', 'shipping_time', "int(11)");
    }

    public function safeDown()
    {
        echo "m170804_072036_add_order_column has been reverted.\n";
        $this->dropColumn('orders', 'payment_time');
        $this->dropColumn('orders', 'shipping_time');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170804_072036_add_order_column cannot be reverted.\n";

        return false;
    }
    */
}
