<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `member`.
 */
class m171020_062108_create_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('member', [
            'id' => Schema::TYPE_PK,
            'member_number' => 'varchar(128) not null',
            'name' => 'varchar(128) not null',
            'ssid' => 'varchar(16) not null',
            'sex' => 'tinyint(1)',
            'birth_date' => Schema::TYPE_INTEGER,
            'bank' => 'varchar(128)',
            'branch_bank' => 'varchar(128)',
            'account_number' => Schema::TYPE_INTEGER,
            'useful_date' => Schema::TYPE_INTEGER,
            'email'=> 'varchar(255)',
            'phone' => 'varchar(16)',
            'address' => 'varchar(255)',
            'is_stop' => 'tinyint(1)',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('member');
    }
}
