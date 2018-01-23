<?php
use yii\db\Schema;
use yii\db\Migration;

class m170421_163434_meta_tables extends Migration
{
    public function up()
    {
        $this->createTable('category_meta', [
            'id' => Schema::TYPE_PK,
            'category_id' => Schema::TYPE_INTEGER,
            'sub_name' => 'varchar(128)',
            'avatar' => 'varchar(256)',
            'description' => Schema::TYPE_TEXT,
            'content' => Schema::TYPE_TEXT,
        ]);

        $this->createTable('news_meta_event', [
            'id' => Schema::TYPE_PK,
            'news_id' => Schema::TYPE_INTEGER,
            'location' => 'varchar(128)',
            'link' => 'varchar(256)',
            'event_time' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('product_meta_oil', [
            'id' => Schema::TYPE_PK,
            'product_id' => Schema::TYPE_INTEGER,
            'name_en' => 'varchar(256)',
            'bg_image' => 'varchar(256)',
            'capacity' => 'varchar(32)',
            'effects' => Schema::TYPE_TEXT,
            'effects_note' => 'varchar(256)',
            'region' => 'varchar(128)',
            'ingredient' => 'varchar(256)',
            'feature' => 'varchar(256)',
            'suggestion' => Schema::TYPE_TEXT,
            'warnings' => Schema::TYPE_TEXT,
        ]);

        $this->createTable('product_meta_mask', [
            'id' => Schema::TYPE_PK,
            'product_id' => Schema::TYPE_INTEGER,
            'purpose' => 'varchar(256)',
            'bg_image' => 'varchar(256)',
            'capacity' => 'varchar(32)',
            'useage' => 'text',
            'purpose' => 'varchar(256)',
            'region' => 'varchar(128)',
            'ingredient' => 'varchar(256)',
            'madeoff' => 'varchar(256)',
            'expiration' => 'varchar(128)',
            'warnings' => Schema::TYPE_TEXT,
        ]);

        $this->createTable('product_meta_soap', [
            'id' => Schema::TYPE_PK,
            'product_id' => Schema::TYPE_INTEGER,
            'bg_image' => 'varchar(256)',
            'useage' => Schema::TYPE_TEXT,
            'weight' => 'varchar(256)',
            'suitable' => 'varchar(128)',
            'ingredient' => 'varchar(256)',
            'expiration' => Schema::TYPE_TEXT,
            'warnings' => Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        echo "m170421_163434_meta_tables has been reverted.\n";
        $this->dropTable('category_meta');
        $this->dropTable('news_meta_event');
        $this->dropTable('product_meta_oil');
        $this->dropTable('product_meta_mask');
        $this->dropTable('product_meta_soap');
        return true;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
