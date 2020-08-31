<?php

use yii\db\Migration;

/**
 * Class m200831_110819_identity_card_table
 */
class m200831_110819_identity_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%identity_card}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'size'=>$this->integer(),
            'extension'=>$this->string(),
            'mime_type'=>$this->string(),
            'status'=>$this->integer()->defaultValue(9)
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%identity_card}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200831_110819_identity_card_table cannot be reverted.\n";

        return false;
    }
    */
}
