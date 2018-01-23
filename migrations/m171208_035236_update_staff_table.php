<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171208_035236_update_staff_table
 */
class m171208_035236_update_staff_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropTable('staff');
        $this->createTable('staff', [
            'id' => Schema::TYPE_PK,
            'number' =>Schema::TYPE_INTEGER,
            'name' => 'varchar(16) not null',
            'email' => 'varchar(128) not null',
            'phone' => 'varchar(16) not null',
            'password' => 'varchar(16) not null',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171208_035236_update_staff_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171208_035236_update_staff_table cannot be reverted.\n";

        return false;
    }
    */
}
