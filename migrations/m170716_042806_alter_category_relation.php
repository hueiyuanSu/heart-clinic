<?php

use yii\db\Migration;

class m170716_042806_alter_category_relation extends Migration
{
    public function safeUp()
    {
        $this->renameColumn('categories', 'parent', "parent_id");
        $this->renameColumn('courses', 'category', "category_id");
        $this->renameColumn('files', 'category', "category_id");
        $this->renameColumn('media', 'category', "category_id");
        $this->renameColumn('news', 'category', "category_id");
        $this->renameColumn('pages', 'category', "category_id");
        $this->renameColumn('products', 'category', "category_id");
        $this->renameColumn('staff', 'category', "category_id");
    }

    public function safeDown()
    {
        echo "m170716_042806_alter_category_relation has been reverted.\n";
        $this->renameColumn('categories', 'parent_id', "parent");
        $this->renameColumn('courses', 'category_id', "category");
        $this->renameColumn('files', 'category_id', "category");
        $this->renameColumn('media', 'category_id', "category");
        $this->renameColumn('news', 'category_id', "category");
        $this->renameColumn('pages', 'category', "category_id");
        $this->renameColumn('products', 'category', "category_id");
        $this->renameColumn('staff', 'category', "category_id");
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170716_042806_alter_category_relation cannot be reverted.\n";

        return false;
    }
    */
}
