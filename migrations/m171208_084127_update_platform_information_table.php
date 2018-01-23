<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171208_084127_update_platform_information_table
 */
class m171208_084127_update_platform_information_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('platform_information','writer','varchar(16)');
        $this->addColumn('platform_information','department','varchar(16)');
        $this->addColumn('platform_information','cellphone','varchar(16)');
        $this->addColumn('platform_information','fax','varchar(16)');
        $this->addColumn('platform_information','website','varchar(128)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171208_084127_update_platform_information_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171208_084127_update_platform_information_table cannot be reverted.\n";

        return false;
    }
    */
}
