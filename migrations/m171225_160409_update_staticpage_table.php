<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171225_160409_update_staticpage_table
 */
class m171225_160409_update_staticpage_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('staticpage','content');
        $this->addColumn('staticpage','content','text');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171225_160409_update_staticpage_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171225_160409_update_staticpage_table cannot be reverted.\n";

        return false;
    }
    */
}
