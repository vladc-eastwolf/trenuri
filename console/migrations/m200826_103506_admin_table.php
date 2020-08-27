<?php

use yii\db\Migration;

/**
 * Class m200826_103506_admin_table
 */
class m200826_103506_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'auth_key' => $this->string(32)->notNull()->defaultValue(null),
            'firstname' => $this->string()->notNull()->defaultValue(null),
            'lastname' => $this->string()->notNull()->defaultValue(null),
            'phone' => $this->string()->notNull()->defaultValue(null),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $hash = Yii::$app->getSecurity()->generatePasswordHash('123456');
        $this->insert('admin',['password_hash'=>$hash,'email'=>'admin@train.com']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%admin}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_103506_admin_table cannot be reverted.\n";

        return false;
    }
    */
}
