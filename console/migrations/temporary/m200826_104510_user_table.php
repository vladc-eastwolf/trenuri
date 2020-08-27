<?php

use yii\db\Migration;

/**
 * Class m200826_104510_user_table
 */
class m200826_104510_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user1}}', [
            'id' => $this->primaryKey(),
            'auth_key' => $this->string(32)->notNull(),
            'firstname' => $this->string()->notNull(),
            'lastname' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'image_id' => $this->integer()->defaultValue(null),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'verification_token' => $this->string()->defaultValue(null)
        ]);
//        $this->addForeignKey('fk_user_image','user1','image_id','image1','id','no action','no action');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('fk_user_image','user1');
        $this->dropTable('{{user1}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_104510_user_table cannot be reverted.\n";

        return false;
    }
    */
}
