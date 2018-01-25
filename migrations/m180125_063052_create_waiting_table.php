<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `waiting`.
 */
class m180125_063052_create_waiting_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('diseasetime','weekdays');
        $this->addColumn('diseasetime','weekdays',Schema::TYPE_INTEGER);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('waiting');
    }
}
