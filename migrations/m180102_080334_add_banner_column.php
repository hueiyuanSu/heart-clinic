<?php

use yii\db\Migration;

/**
 * Class m180102_080334_add_banner_column
 */
class m180102_080334_add_banner_column extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('banners','title','varchar(255)');
        $this->addColumn('banners','subtitle','varchar(255)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180102_080334_add_banner_column has been reverted.\n";
        $this->dropColumn('banners','subtitle');
        $this->dropColumn('banners','title');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180102_080334_add_banner_column cannot be reverted.\n";

        return false;
    }
    */
}
