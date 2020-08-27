<?php

use yii\db\Migration;

/**
 * Class m200826_133658_schedule_table
 */
class m200826_133658_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule}}',[
            'id'=>$this->primaryKey(),
            'trip_id'=>$this->integer()->notNull(),
            'station_id'=>$this->integer()->notNull(),
            'station_order'=>$this->integer()->notNull(),
            'distance'=>$this->string(),
            'arrival_time'=>$this->time(),
            'departure_time'=>$this->time(),
        ]);
        $this->addForeignKey('fk_schedule_trip','schedule','trip_id','trip','id','no action','no action');
        $this->addForeignKey('fk_schedule_station','schedule','station_id','station','id','no action','no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_schedule_station','schedule');
        $this->dropForeignKey('fk_schedule_trip','schedule');
        $this->dropTable('{{%schedule}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_133658_schedule_table cannot be reverted.\n";

        return false;
    }
    */
}
