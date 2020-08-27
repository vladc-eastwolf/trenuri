<?php

use yii\db\Migration;

/**
 * Class m200826_130700_train_table
 */
class m200826_130700_train_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%train}}',[
            'id'=>$this->primaryKey(),
            'type'=>$this->string()->notNull(),
            'number'=>$this->string()->notNull()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropTable('{{%train}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_130700_train_table cannot be reverted.\n";

        return false;
    }
    */
}
