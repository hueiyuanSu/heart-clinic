<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180217_033648_update_disease_table
 */
class m180217_033648_update_disease_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('datetime','disease_id',Schema::TYPE_INTEGER.' not null default 0');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180217_033648_update_disease_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180217_033648_update_disease_table cannot be reverted.\n";

        return false;
    }
    */
}
