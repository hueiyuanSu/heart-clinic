<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180112_035253_update_static_page_table
 */
class m180112_035253_update_static_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('staticpage','version',$this->bigInteger()->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180112_035253_update_static_page_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180112_035253_update_static_page_table cannot be reverted.\n";

        return false;
    }
    */
}
