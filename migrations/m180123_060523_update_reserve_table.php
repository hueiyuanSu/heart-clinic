<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180123_060523_update_reserve_table
 */
class m180123_060523_update_reserve_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('reserve','reserve_datetime');
        $this->addColumn('reserve','reserve_date',Schema::TYPE_INTEGER);
        $this->addColumn('reserve','reserve_time',Schema::TYPE_INTEGER);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180123_060523_update_reserve_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180123_060523_update_reserve_table cannot be reverted.\n";

        return false;
    }
    */
}
