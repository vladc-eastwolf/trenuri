<?php

use yii\db\Migration;

/**
 * Class m200826_140039_composition_history_table
 */
class m200826_140039_composition_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%composition_history}}', [
            'composition_id' => $this->integer()->unique(),
            'train_id' => $this->integer()->defaultValue(null),
            'seats_first_class' => $this->integer(),
            'seats_second_class' => $this->integer(),
            'additional_capacity' => $this->integer(),
            'update_time' => 'DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'operator_id' => $this->integer()
        ]);
        $this->addPrimaryKey('comp_hist_pk', 'composition_history', ['composition_id', 'update_time']);
        $this->addForeignKey('fk_comp_history_train', 'composition_history', 'train_id', 'train', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_comp_history_operator', 'composition_history', 'operator_id', 'operator', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_comp_history_composition', 'composition_history', 'composition_id', 'composition', 'id', 'no action', 'no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_comp_history_composition','composition_history');
        $this->dropForeignKey('fk_comp_history_operator','composition_history');
        $this->dropForeignKey('fk_comp_history_train','composition_history');
        $this->dropPrimaryKey('comp_hist_pk','composition_history');
        $this->dropTable('{{%composition_history}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_140039_composition_history_table cannot be reverted.\n";

        return false;
    }
    */
}
