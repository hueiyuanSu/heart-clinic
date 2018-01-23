<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180122_061417_update_member_table
 */
class m180122_061417_update_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('member','valitate_number',Schema::TYPE_INTEGER);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180122_061417_update_member_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180122_061417_update_member_table cannot be reverted.\n";

        return false;
    }
    */
}
