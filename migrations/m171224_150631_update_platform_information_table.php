<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171224_150631_update_platform_information_table
 */
class m171224_150631_update_platform_information_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('platform_information','content','varchar(255)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171224_150631_update_platform_information_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171224_150631_update_platform_information_table cannot be reverted.\n";

        return false;
    }
    */
}
