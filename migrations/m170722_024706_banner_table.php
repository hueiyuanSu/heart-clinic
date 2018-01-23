<?php
use yii\db\Schema;
use yii\db\Migration;

class m170722_024706_banner_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('banners', [
            'id' => Schema::TYPE_PK,
            'name' => 'varchar(128) not null',
            'avatar' =>  'varchar(256)',
            'img_url' =>  'varchar(256)',
            'sorts' => Schema::TYPE_INTEGER,
            'start_at'=> Schema::TYPE_INTEGER,
            'end_at'=> Schema::TYPE_INTEGER,
            'status' => 'int(4) DEFAULT 1',
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);
    }

    public function safeDown()
    {
        echo "m170722_024706_banner_table has been reverted.\n";
        $this->dropTable('banners');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170722_024706_banner_table cannot be reverted.\n";

        return false;
    }
    */
}
