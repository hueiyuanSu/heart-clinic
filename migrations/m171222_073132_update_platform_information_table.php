<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171222_073132_update_platform_information_table
 */
class m171222_073132_update_platform_information_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('platform_information','is_confirmed','tinyint(11)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171222_073132_update_platform_information_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171222_073132_update_platform_information_table cannot be reverted.\n";

        return false;
    }
    */
}
