<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171223_033740_update_member_table
 */
class m171223_033740_update_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('member','name');
        $this->dropColumn('member','ssid');
        $this->addColumn('member','name','varchar(128)');
        $this->addColumn('member','ssid','varchar(16)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171223_033740_update_member_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171223_033740_update_member_table cannot be reverted.\n";

        return false;
    }
    */
}
