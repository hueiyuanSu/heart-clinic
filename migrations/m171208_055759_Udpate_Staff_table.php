<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171208_055759_Udpate_Staff_table
 */
class m171208_055759_Udpate_Staff_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('staff','number');
        $this->addColumn('staff','employee_number','varchar(16)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171208_055759_Udpate_Staff_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171208_055759_Udpate_Staff_table cannot be reverted.\n";

        return false;
    }
    */
}
