<?php

use yii\db\Migration;

/**
 * Class m200826_111940_image_table
 */
class m200826_111940_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{image}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull()->defaultValue(null),
            'size'=>$this->integer()->notNull(),
            'extension'=>$this->string()->notNull(),
            'mime_type'=>$this->string()->notNull()->defaultValue(null),
            'user_id'=>$this->integer()->notNull()->unique(),
            'created_at'=>'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{image}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_111940_image_table cannot be reverted.\n";

        return false;
    }
    */
}
