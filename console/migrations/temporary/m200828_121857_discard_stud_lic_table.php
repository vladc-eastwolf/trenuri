<?php

use yii\db\Migration;

/**
 * Class m200828_121857_discard_stud_lic_table
 */
class m200828_121857_discard_stud_lic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropTable('{{%schoolboy_license}}');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200828_121857_discard_stud_lic_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200828_121857_discard_stud_lic_table cannot be reverted.\n";

        return false;
    }
    */
}
