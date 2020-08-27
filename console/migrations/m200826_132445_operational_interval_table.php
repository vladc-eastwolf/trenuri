<?php

use yii\db\Migration;

/**
 * Class m200826_132445_operational_interval_table
 */
class m200826_132445_operational_interval_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%operational_interval}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notNull(),
            'monday' => $this->boolean()->defaultValue(0),
            'tuesday' => $this->boolean()->defaultValue(0),
            'wednesday' => $this->boolean()->defaultValue(0),
            'thursday' => $this->boolean()->defaultValue(0),
            'friday' => $this->boolean()->defaultValue(0),
            'saturday' => $this->boolean()->defaultValue(0),
            'sunday' => $this->boolean()->defaultValue(0),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%operational_interval}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_132445_operational_interval_table cannot be reverted.\n";

        return false;
    }
    */
}
