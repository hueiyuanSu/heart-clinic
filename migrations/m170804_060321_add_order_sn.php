<?php

use yii\db\Migration;

class m170804_060321_add_order_sn extends Migration
{
    public function safeUp()
    {
        $this->addColumn('orders', 'sn', "varchar(16)");
    }

    public function safeDown()
    {
        echo "m170804_060321_add_order_sn has been reverted.\n";
        $this->dropColumn('orders', 'sn');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170804_060321_add_order_sn cannot be reverted.\n";

        return false;
    }
    */
}
