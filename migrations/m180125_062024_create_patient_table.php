<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `patient`.
 */
class m180125_062024_create_patient_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('patient', [
            'id' => Schema::TYPE_PK,
            'patient_name' => 'varchar(11)',
            'patient_phone' => 'varchar(11)',
            'reserve_number' => Schema::TYPE_INTEGER,
            'waiting_number' => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient');
    }
}
