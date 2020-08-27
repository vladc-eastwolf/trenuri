<?php

use yii\db\Migration;

/**
 * Class m200826_130933_line_table
 */
class m200826_130933_line_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%line}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'operator_id' => $this->integer()->notNull(),
            'departure_station_id' => $this->integer()->notNull(),
            'arrival_station_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_line_operator', 'line', 'operator_id', 'operator', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_line_departureStation', 'line', 'departure_station_id', 'station', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_line_arrivalStation', 'line', 'arrival_station_id', 'station', 'id', 'no action', 'no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_line_arrivalStation', 'line');
        $this->dropForeignKey('fk_line_departureStation', 'line');
        $this->dropForeignKey('fk_line_operator', 'line');
        $this->dropTable('{{%line}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_130933_line_table cannot be reverted.\n";

        return false;
    }
    */
}
