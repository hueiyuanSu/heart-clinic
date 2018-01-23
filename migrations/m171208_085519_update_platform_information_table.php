<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171208_085519_update_platform_information_table
 */
class m171208_085519_update_platform_information_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171208_085519_update_platform_information_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171208_085519_update_platform_information_table cannot be reverted.\n";

        return false;
    }
    */
}
