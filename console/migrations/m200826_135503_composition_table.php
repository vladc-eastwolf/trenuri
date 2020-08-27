<?php

use yii\db\Migration;

/**
 * Class m200826_135503_composition_table
 */
class m200826_135503_composition_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%composition}}',[
            'id'=>$this->primaryKey(),
            'train_id'=>$this->integer()->notNull(),
            'seats_first_class'=>$this->integer(),
            'seats_second_class'=>$this->integer(),
            'additional_capacity'=>$this->integer(),
            'update_time'=>$this->dateTime(),
            'operator_id'=>$this->integer()->notNull(),
            'description'=>$this->string()

        ]);
        $this->addForeignKey('fk_composition_train','composition','train_id','train','id','no action','no action');
        $this->addForeignKey('fk_composition_operator','composition','operator_id','operator','id','no action','no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_composition_operator','composition');
        $this->dropForeignKey('fk_composition_train','composition');
        $this->dropTable('{{%composition}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_135503_composition_table cannot be reverted.\n";

        return false;
    }
    */
}
