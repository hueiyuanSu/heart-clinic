<?php

use yii\db\Migration;

/**
 * Class m180103_072438_add_staff_avatar
 */
class m180103_072438_add_staff_avatar extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('staff','avatar','varchar(256)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180103_072438_add_staff_avatar has been reverted.\n";
        $this->dropColumn('staff','avatar');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180103_072438_add_staff_avatar cannot be reverted.\n";

        return false;
    }
    */
}
