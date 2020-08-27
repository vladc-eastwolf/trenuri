<?php

use yii\db\Migration;

/**
 * Class m200826_142518_ticket_table
 */
class m200826_142518_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ticket}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'email' => $this->string(),
            'user_id' => $this->integer(),
            'sales_time' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'composition_id' => $this->integer(),
            'journey_date' => $this->date(),
            'departure_station_id' => $this->integer(),
            'arrival_station_id' => $this->integer(),
            'departure_time' => $this->time(),
            'arrival_time' => $this->time(),
            'distance' => $this->float(),
            'is_first_class' => $this->boolean(),
            'is_second_class' => $this->boolean(),
            'seat_reserved' => $this->string(),
            'price' => $this->decimal()
        ]);
        $this->addForeignKey('fk_ticket_user', 'ticket', 'user_id', 'user', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_ticket_composition', 'ticket', 'composition_id', 'composition', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_ticket_departureStation', 'ticket', 'departure_station_id', 'station', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_ticket_arrivalStation', 'ticket', 'arrival_station_id', 'station', 'id', 'no action', 'no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_ticket_arrivalStation', 'ticket');
        $this->dropForeignKey('fk_ticket_departureStation', 'ticket');
        $this->dropForeignKey('fk_ticket_composition', 'ticket');
        $this->dropForeignKey('fk_ticket_user', 'ticket');
        $this->dropTable('{{%ticket}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_142518_ticket_table cannot be reverted.\n";

        return false;
    }
    */
}
