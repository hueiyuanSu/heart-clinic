<?php

use yii\db\Migration;

class m171020_014457_update_member_profile extends Migration
{
    public function safeUp()
    {
        $this->addColumn('member_profile','name', "varchar(16)");
        $this->addColumn('member_profile','ssid','varchar(16)');
        $this->addColumn('member_profile','sex', "tinyint(1)");
        $this->addColumn('member_profile','birth_date', "int(11)");
        $this->addColumn('member_profile','bank', "varchar(20)");
        $this->addColumn('member_profile','branch_bank', "varchar(20)");
        $this->addColumn('member_profile','account_number', "int(20)");
        $this->addColumn('member_profile','useful_date', "int(11)");
        $this->dropColumn('member_profile','firstname');
        $this->dropColumn('member_profile','lastname');
        $this->dropColumn('member_profile','phone');
        $this->dropColumn('member_profile','mobile');
        $this->dropColumn('member_profile','address');
    }

    public function safeDown()
    {
        echo "m171020_014457_update_member_profile cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171020_014457_update_member_profile cannot be reverted.\n";

        return false;
    }
    */
}
