<?php
use yii\db\Schema;
use yii\db\Migration;

class m171103_054600_update_member_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('member','password','varchar(16)');
    }

    public function safeDown()
    {
        echo "m171103_054600_update_member_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171103_054600_update_member_table cannot be reverted.\n";

        return false;
    }
    */
}
