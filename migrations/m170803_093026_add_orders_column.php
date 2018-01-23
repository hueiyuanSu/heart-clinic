<?php

use yii\db\Migration;

class m170803_093026_add_orders_column extends Migration
{
    public function safeUp()
    {
        $this->addColumn('orders', 'recipient', "varchar(255)");
        $this->addColumn('orders', 'phone', "varchar(16)");
        $this->addColumn('orders', 'mobile', "varchar(16)");
        $this->addColumn('orders', 'address', "varchar(255)");
    }

    public function safeDown()
    {
        echo "m170803_093026_add_orders_column has been reverted.\n";

        $this->dropColumn('orders', 'recipient');
        $this->dropColumn('orders', 'phone');
        $this->dropColumn('orders', 'mobile');
        $this->dropColumn('orders', 'address');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170803_093026_add_orders_column cannot be reverted.\n";

        return false;
    }
    */
}
