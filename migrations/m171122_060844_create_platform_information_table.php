<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `platform_information`.
 */
class m171122_060844_create_platform_information_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('platform_information', [
            'id' => Schema::TYPE_PK,
            'category' => 'varchar(128) not null',
            'company' => 'varchar(128) not null',
            'principal' => 'varchar(16) not null',
            'employer_identification_number' => Schema::TYPE_INTEGER,
            'factory_number' => Schema::TYPE_INTEGER,
            'address' => 'varchar(128)',
            'phone' => 'varchar(16)',
            'email' => 'varchar(128)',
            'register_date' => Schema::TYPE_INTEGER,
            'remark'=> 'varchar(255)',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('platform_information');
    }
}
