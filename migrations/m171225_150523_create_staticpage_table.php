<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `staticpage`.
 */
class m171225_150523_create_staticpage_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('staticpage', [
            'id' => Schema::TYPE_PK,
            'category' => 'varchar(128) not null',
            'content'=> 'varchar(255) not null',
        ]);
        $this->dropTable('static');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('staticpage');
    }
}
