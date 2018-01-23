<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `static`.
 */
class m171225_145551_create_static_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('static', [
            'id' => Schema::TYPE_PK,
            'category' => 'varchar(128) not null',
            'content'=> 'varchar(255) not null',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('static');
    }
}
