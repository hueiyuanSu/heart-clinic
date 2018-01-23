<?php
use yii\db\Schema;
use yii\db\Migration;

class m170722_020400_add_member_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('member_profile', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER,
            'firstname' => 'varchar(16)',
            'lastname' => 'varchar(16)',
            'phone' => 'varchar(16)',
            'mobile' => 'varchar(16)',
            'address'=>'varchar(64)',
        ]);
    }

    public function safeDown()
    {
        echo "m170722_020400_add_member_table has been reverted.\n";
        $this->dropTable('member_profile');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170722_020400_add_member_table cannot be reverted.\n";

        return false;
    }
    */
}
