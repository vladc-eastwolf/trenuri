<?php

use yii\db\Migration;

/**
 * Class m200826_125006_contact_table
 */
class m200826_125006_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'email'=>$this->string()->notNull(),
            'subject'=>$this->string()->notNull(),
            'body'=>$this->string()->notNull(),
            'status'=>$this->boolean()->defaultValue(0)
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_125006_contact_table cannot be reverted.\n";

        return false;
    }
    */
}
