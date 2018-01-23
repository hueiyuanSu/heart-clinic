<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `reserve`.
 */
class m180123_054517_create_reserve_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reserve', [
            'id' => Schema::TYPE_PK,
            'reserve_number' => Schema::TYPE_INTEGER,
            'patient_name' => 'varchar(128) not null',
            'patient_phone' => 'varchar(128) not null',
            'reserve_datetime' => Schema::TYPE_INTEGER,
            'create_date' => Schema::TYPE_INTEGER,
            'update_date' => Schema::TYPE_INTEGER,
            'remark'=> 'varchar(255)',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('reserve');
    }
}
