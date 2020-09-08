<?php

use yii\db\Migration;

/**
 * Class m200908_123921_add_trip_id_to_operates
 */
class m200908_123921_add_trip_id_to_operates extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('composition','trip_id','integer');
        $this->addForeignKey('fk_composition_trip','composition','trip_id','trip','id','set null','cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('composition','trip_id');
       $this->dropForeignKey('fk_composition_trip','composition');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200908_123921_add_trip_id_to_operates cannot be reverted.\n";

        return false;
    }
    */
}
