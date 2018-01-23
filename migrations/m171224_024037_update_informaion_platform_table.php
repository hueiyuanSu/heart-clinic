<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171224_024037_update_informaion_platform_table
 */
class m171224_024037_update_informaion_platform_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('platform_information','mem_number','varchar(128)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171224_024037_update_informaion_platform_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171224_024037_update_informaion_platform_table cannot be reverted.\n";

        return false;
    }
    */
}
