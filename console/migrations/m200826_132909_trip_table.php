<?php

use yii\db\Migration;

/**
 * Class m200826_132909_trip_table
 */
class m200826_132909_trip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trip}}',[
            'id'=>$this->primaryKey(),
            'line_id'=>$this->integer()->notNull(),
            'operational_interval_id'=>$this->integer()->notNull(),
            'train_id'=>$this->integer()->notNull(),
            'departure_time'=>$this->time()->notNull(),
            'arrival_time'=>$this->time()->notNull(),
        ]);
        $this->addForeignKey('fk_trip_line','trip','line_id','line','id','no action','no action');
        $this->addForeignKey('fk_trip_op_interval','trip','operational_interval_id','operational_interval','id','no action','no action');
        $this->addForeignKey('fk_trip_train','trip','train_id','train','id','no action','no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_trip_train','trip');
        $this->dropForeignKey('fk_trip_op_interval','trip');
        $this->dropForeignKey('fk_trip_line','trip');
        $this->dropTable('{{%trip}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_132909_trip_table cannot be reverted.\n";

        return false;
    }
    */
}
