<?php

use yii\db\Migration;

/**
 * Class m200827_100729_discount_table
 */
class m200827_100729_discount_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discount}}',[
            'id'=>$this->primaryKey(),
            'user_id'=>$this->integer()->notNull()->unique(),
            'student'=>$this->boolean()->defaultValue(null),
            'schoolboy'=>$this->boolean()->defaultValue(null),
            'retired'=>$this->boolean()->defaultValue(null),
            'identity_card'=>$this->string(),
            'size'=>$this->integer(),
            'extension'=>$this->string(),
            'mime_type'=>$this->string(),
            'created_at'=>'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'

        ]);
        $this->addForeignKey('fk_discount_user','discount','user_id','user','id','no action','no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_discount_user','discount');
        $this->dropTable('{{%discount}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200827_100729_discount_table cannot be reverted.\n";

        return false;
    }
    */
}
