<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171223_153734_update_member_table
 */
class m171223_153734_update_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('member','account','varchar(255)');
        $this->addColumn('member','contact_address','varchar(255)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171223_153734_update_member_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171223_153734_update_member_table cannot be reverted.\n";

        return false;
    }
    */
}
