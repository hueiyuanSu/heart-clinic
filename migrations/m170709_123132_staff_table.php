<?php
use yii\db\Schema;
use yii\db\Migration;

class m170709_123132_staff_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('staff', [
            'id' => Schema::TYPE_PK,
            'name' => 'varchar(128) not null',
            'title'=>'varchar(128)',
            'sub_title'=>'varchar(128)',
            'category' => Schema::TYPE_INTEGER,
            'description' => Schema::TYPE_TEXT,
            'avatar' => 'varchar(256)',
            'keyword' => 'varchar(256)',
            'features' => 'varchar(256)',
            'content' => Schema::TYPE_TEXT,
            'sorts' => Schema::TYPE_INTEGER,
            'status' => 'int(4) DEFAULT 1',
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);
    }

    public function safeDown()
    {
        echo "m170709_123132_staff_table has been reverted.\n";
        $this->dropTable('staff');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170709_123132_staff_table cannot be reverted.\n";

        return false;
    }
    */
}
