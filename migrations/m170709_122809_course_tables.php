<?php
use yii\db\Schema;
use yii\db\Migration;

class m170709_122809_course_tables extends Migration
{
    public function safeUp()
    {
        $this->createTable('courses', [
            'id' => Schema::TYPE_PK,
            'name' => 'varchar(128) not null',
            'category' => Schema::TYPE_INTEGER,
            'description' => 'text',
            'keyword' => 'varchar(256)',
            'features' => 'varchar(256)',
            'content' => Schema::TYPE_TEXT,
            'sorts' => Schema::TYPE_INTEGER,
            'price'=> Schema::TYPE_INTEGER,
            'status' => 'int(4) DEFAULT 1',
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('course_schedule', [
            'id' => Schema::TYPE_PK,
            'course_id' => Schema::TYPE_INTEGER,
            'sorts' => 'int(11)',
            'status' => 'int(4) DEFAULT 1',
            'start_at' => Schema::TYPE_INTEGER,
            'end_at' => Schema::TYPE_INTEGER,
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('order_course', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER,
            'course_id' => Schema::TYPE_INTEGER,
            'total_price' => Schema::TYPE_INTEGER,
            'name' => 'varchar(12)  not null',
            'name_en' => 'varchar(32)',
            'birthday'=>'varchar(16)',
            'phone' => 'varchar(16)  not null',
            'fax' => 'varchar(16)',
            'mobile' => 'varchar(16)',
            'social_id' => 'varchar(128)',
            'note' => Schema::TYPE_TEXT,
            'status' => 'int(4) DEFAULT 1',
            'payment_status' => 'int(4) DEFAULT 0',
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);
    }

    public function safeDown()
    {
        echo "m170709_122809_course_tables has been reverted.\n";
        $this->dropTable('courses');
        $this->dropTable('course_schedule');
        $this->dropTable('order_course');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170709_122809_course_tables cannot be reverted.\n";

        return false;
    }
    */
}
