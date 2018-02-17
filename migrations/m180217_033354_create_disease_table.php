<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `disease`.
 */
class m180217_033354_create_disease_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('disease', [
            'id' => Schema::TYPE_PK,
            'name' => 'varchar(80)',
        ]);
        $this->insert('disease', [
            'name' => '針灸',
        ]);
        $this->insert('disease', [
            'name' => '內科',
        ]);
        $this->insert('disease', [
            'name' => '傷科',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('disease');
    }
}
