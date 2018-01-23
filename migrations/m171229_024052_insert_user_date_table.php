<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171229_024052_insert_user_date_table
 */
class m171229_024052_insert_user_date_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password_hash' => '$2y$10$0o2.K0KjxDvrfMIjm3WZfu1zCfj2xxu0OhOxlpYB.OsOlnkOmNwZu',
            'auth_key' => '9qaRUWim2xdoIbk-TkfdKdjCXORKmXtl',
            'confirmed_at' => '1503900937',
            'created_at' => '1503900937',
            'updated_at' => '1503900937',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171229_024052_insert_user_date_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171229_024052_insert_user_date_table cannot be reverted.\n";

        return false;
    }
    */
}
