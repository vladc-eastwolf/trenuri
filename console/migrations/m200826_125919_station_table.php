<?php

use yii\db\Migration;

/**
 * Class m200826_125919_station_table
 */
class m200826_125919_station_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%station}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'location_id'=>$this->integer()->notNull()
        ]);
        $this->addForeignKey('fk_station_location','station','location_id','location','id','no action','no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_station_location','station');
        $this->dropTable('{{%station}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_125919_station_table cannot be reverted.\n";

        return false;
    }
    */
}
