<?php

use yii\db\Migration;

/**
 * Class m200828_121836_discard_discount_table
 */
class m200828_121836_discard_discount_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_schoolboy_lic_discount', 'schoolboy_license');
        $this->dropTable('{{%discount}}');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200828_121836_discard_discount_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200828_121836_discard_discount_table cannot be reverted.\n";

        return false;
    }
    */
}
