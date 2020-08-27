<?php

use yii\db\Migration;

/**
 * Class m200826_141414_operates_table
 */
class m200826_141414_operates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%operates}}', [
            'id' => $this->primaryKey(),
            'composition_id' => $this->integer()->notNull(),
            'trip_id' => $this->integer()->notNull(),
            'date_from' => $this->dateTime(),
            'date_to' => $this->dateTime(),
        ]);
        $this->addForeignKey('fk_operates_composition', 'operates', 'composition_id', 'composition', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_operates_trip', 'operates', 'trip_id', 'trip', 'id', 'no action', 'no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_operates_trip', 'operates');
        $this->dropForeignKey('fk_operates_composition', 'operates');
        $this->dropTable('{{%operates}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_141414_operates_table cannot be reverted.\n";

        return false;
    }
    */
}
