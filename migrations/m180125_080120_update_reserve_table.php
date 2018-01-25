<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180125_080120_update_reserve_table
 */
class m180125_080120_update_reserve_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('reserve','reserve_time');
        $this->addColumn('reserve','reserve_time','varchar(128)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180125_080120_update_reserve_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180125_080120_update_reserve_table cannot be reverted.\n";

        return false;
    }
    */
}
