<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180125_072422_update_diseasetime_table
 */
class m180125_072422_update_diseasetime_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('diseasetime','time');
        $this->addColumn('diseasetime','time','varchar(255)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180125_072422_update_diseasetime_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180125_072422_update_diseasetime_table cannot be reverted.\n";

        return false;
    }
    */
}
