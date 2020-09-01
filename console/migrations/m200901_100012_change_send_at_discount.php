<?php

use yii\db\Migration;

/**
 * Class m200901_100012_change_send_at_discount
 */
class m200901_100012_change_send_at_discount extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('discount','send_at', 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('discount','send_at', 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200901_100012_change_send_at_discount cannot be reverted.\n";

        return false;
    }
    */
}
