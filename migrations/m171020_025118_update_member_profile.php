<?php

use yii\db\Migration;

class m171020_025118_update_member_profile extends Migration
{
    public function safeUp()
    {
        $this->addColumn('member_profile','email','varchar(255)');
        $this->addColumn('member_profile','phone','varchar(16)');
        $this->addColumn('member_profile','address','varchar(255)');
        $this->addColumn('member_profile','is_stop','tinyint(1)');
        $this->addColumn('member_profile','member_number','varchar(16)');
    }

    public function safeDown()
    {
        echo "m171020_025118_update_member_profile cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171020_025118_update_member_profile cannot be reverted.\n";

        return false;
    }
    */
}
