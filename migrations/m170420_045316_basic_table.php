<?php
use yii\db\Schema;
use yii\db\Migration;

class m170420_045316_basic_table extends Migration
{
    public function up()
    {
        $this->createTable("type_hint",[
            "id" => Schema::TYPE_PK,
            'name'=>'varchar(256)',
            'type'=>'varchar(32)',
            "create_at" => Schema::TYPE_INTEGER,
            "modified_at" => Schema::TYPE_INTEGER
        ]);

        $this->createTable('categories', [
            'id' => Schema::TYPE_PK,
            'type' => 'varchar(32)',
            'name' => 'varchar(128) not null',
            'parent' => Schema::TYPE_INTEGER,
            'sorts' => Schema::TYPE_INTEGER,
            'status' => 'int(4) DEFAULT 1',
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('news', [
            'id' => Schema::TYPE_PK,
            'name' => 'varchar(128) not null',
            'category' => Schema::TYPE_INTEGER,
            'description' => Schema::TYPE_TEXT,
            'keyword' => 'varchar(256)',
            'content' => Schema::TYPE_TEXT,
            'sorts' => Schema::TYPE_INTEGER,
            'status' => 'int(4) DEFAULT 1',
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('products', [
            'id' => Schema::TYPE_PK,
            'name' => 'varchar(128) not null',
            'sub_name' => 'varchar(128) not null',
            'category' => Schema::TYPE_INTEGER,
            'price' => Schema::TYPE_INTEGER,
            'sale_price' => Schema::TYPE_INTEGER,
            'meta_type' => 'varchar(32)',
            'description' => Schema::TYPE_TEXT,
            'keyword' => 'varchar(256)',
            'content' => Schema::TYPE_TEXT,
            'status' => 'int(4) DEFAULT 1',
            'avatar' => 'varchar(256)',
            'sorts' => Schema::TYPE_INTEGER,
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('orders', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER,
            'total_price' => Schema::TYPE_INTEGER,
            'item_count' => Schema::TYPE_INTEGER,
            'status' => 'int(4) DEFAULT 1',
            'payment_status' => 'int(4) DEFAULT 0',
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('order_item', [
            'id' => Schema::TYPE_PK,
            'order_id' => Schema::TYPE_INTEGER,
            'name' => 'varchar(128) not null',
            'user_id' => Schema::TYPE_INTEGER,
            'product_id' => Schema::TYPE_INTEGER,
            'price' => Schema::TYPE_INTEGER,
            'quantity' => Schema::TYPE_TEXT,
            'total' => Schema::TYPE_INTEGER,
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('pages', [
            'id' => Schema::TYPE_PK,
            'name' => 'varchar(128) not null',
            'category' => Schema::TYPE_INTEGER,
            'description' => 'text',
            'keyword' => 'varchar(256)',
            'features' => 'varchar(256)',
            'content' => Schema::TYPE_TEXT,
            'sorts' => Schema::TYPE_INTEGER,
            'status' => 'int(4) DEFAULT 1',
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('files', [
            'id' => Schema::TYPE_PK,
            'target_id' => Schema::TYPE_INTEGER,
            'category' => Schema::TYPE_INTEGER,
            'name' => 'varchar(128) not null',
            'url' => 'varchar(128) not null',
            'sorts' => Schema::TYPE_INTEGER,
            'status' => 'int(4) DEFAULT 1',
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);

        $this->createTable('media', [
            'id' => Schema::TYPE_PK,
            'target_id' => Schema::TYPE_INTEGER,
            'category' => Schema::TYPE_INTEGER,
            'title' => 'varchar(128) not null',
            'avatar_url' => 'varchar(256)',
            'thumb_url' => 'varchar(256)',
            'image_url' => 'varchar(256)',
            'sorts' => Schema::TYPE_INTEGER,
            'status' => 'int(4) DEFAULT 1',
            'modified_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
        ]);
    }

    public function down()
    {
        echo "m170420_045316_basic_table cannot be reverted.\n";
        $this->dropTable('type_hint');
        $this->dropTable('category');
        $this->dropTable('news');
        $this->dropTable('products');
        $this->dropTable('orders');
        $this->dropTable('order_item');
        $this->dropTable('pages');
        $this->dropTable('files');
        $this->dropTable('media');
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
