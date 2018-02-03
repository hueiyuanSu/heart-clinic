<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `datetime`.
 */
class m180203_054758_create_datetime_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropTable('diseasetime');
        $this->createTable('datetime', [
            'id' => Schema::TYPE_PK,
            'date' => Schema::TYPE_INTEGER,
            'time' => Schema::TYPE_INTEGER,
            'weekdays' => 'varchar(11)',
            'is_selected' => Schema::TYPE_INTEGER,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('datetime');
    }
}
