<?php

use yii\db\Migration;

/**
 * Class m200826_130419_operator_table
 */
class m200826_130419_operator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%operator}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'headquarters'=>$this->string()->notNull()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('{{%operator}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_130419_operator_table cannot be reverted.\n";

        return false;
    }
    */
}
