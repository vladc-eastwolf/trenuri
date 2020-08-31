<?php

use yii\db\Migration;

/**
 * Class m200828_122402_new_discount_table
 */
class m200828_122402_new_discount_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discount}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'identity_card_id' => $this->integer()->defaultValue(null),
            'student_id' => $this->integer()->defaultValue(null),
            'school_id' => $this->integer()->defaultValue(null),
            'retired_id' => $this->integer()->defaultValue(null),
            'status' => $this->boolean(),
            'send_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->addForeignKey('fk_discount_user', 'discount', 'user_id', 'user', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_discount_identity', 'discount', 'identity_card_id', 'identity_card', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_discount_student', 'discount', 'student_id', 'student_license', 'id', 'no action', 'no action');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_discount_student', 'discount');
        $this->dropForeignKey('fk_discount_identity', 'discount');
        $this->dropForeignKey('fk_discount_user', 'discount');
        $this->dropTable('{{%discount}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200828_122402_new_discount_table cannot be reverted.\n";

        return false;
    }
    */
}
