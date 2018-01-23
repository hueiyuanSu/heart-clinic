<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180102_095031_add_staff_group
 */
class m180102_095031_add_staff_group extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('staff','group_id',Schema::TYPE_INTEGER);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180102_095031_add_staff_group has been reverted.\n";
         $this->dropColumn('staff','group_id');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180102_095031_add_staff_group cannot be reverted.\n";

        return false;
    }
    */
}
