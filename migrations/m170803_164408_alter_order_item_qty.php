<?php

use yii\db\Migration;

class m170803_164408_alter_order_item_qty extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('order_item', 'quantity', 'int(11)');
    }

    public function safeDown()
    {
        echo "m170803_164408_alter_order_item_qty has been reverted.\n";
        $this->alterColumn('order_item', 'quantity', 'text');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170803_164408_alter_order_item_qty cannot be reverted.\n";

        return false;
    }
    */
}
