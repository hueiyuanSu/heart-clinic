<?php

use yii\db\Migration;

class m170714_110709_add_avatar_column extends Migration
{
    public function safeUp()
    {
        $this->addColumn('news', 'avatar', "varchar(255)");
        $this->addColumn('news', 'bg_image', "varchar(255)");
        $this->addColumn('courses', 'avatar', "varchar(255)");
        $this->addColumn('courses', 'bg_image', "varchar(255)");
        $this->addColumn('products', 'bg_image', "varchar(255)");
    }

    public function safeDown()
    {
        echo "m170714_110709_add_avatar_column has been reverted.\n";
        $this->dropColumn('news', 'avatar');
        $this->dropColumn('news', 'bg_image');
        $this->dropColumn('courses', 'avatar');
        $this->dropColumn('courses', 'bg_image');
        $this->dropColumn('products', 'bg_image');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170714_110709_add_avatar_column cannot be reverted.\n";

        return false;
    }
    */
}
