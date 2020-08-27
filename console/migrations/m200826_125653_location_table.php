<?php

use yii\db\Migration;

/**
 * Class m200826_125653_location_table
 */
class m200826_125653_location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%location}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'postal_code'=>$this->string()->notNull()

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('{{%location}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_125653_location_table cannot be reverted.\n";

        return false;
    }
    */
}
