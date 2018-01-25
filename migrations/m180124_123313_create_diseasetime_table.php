<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `diseasetime`.
 */
class m180124_123313_create_diseasetime_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('diseasetime', [
            'id' => Schema::TYPE_PK,
            'weekdays' => 'varchar(10)',
            'time' => Schema::TYPE_INTEGER,
            'disease' => 'tinyint(1)'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('diseasetime');
    }
}
