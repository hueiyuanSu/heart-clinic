<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180105_032449_insert_categories_table
 */
class m180105_032449_insert_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('categories', [
            'name' => 'staff',
            'status' => 1,
            'parent_id' => 0,
            'modified_at' => time(),
            'created_at' => time(),
        ]);
        $this->insert('categories', [
            'name' => 'industry',
            'status' => 1,
            'parent_id' => 0,
            'modified_at' => time(),
            'created_at' => time(),
        ]);
        $this->insert('categories', [
            'name' => 'service',
            'status' => 1,
            'parent_id' => 0,
            'modified_at' => time(),
            'created_at' => time(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180105_032449_insert_categories_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180105_032449_insert_categories_table cannot be reverted.\n";

        return false;
    }
    */
}
