<?php

use yii\db\Migration;

/**
 * Class m200831_110858_student_license_table
 */
class m200831_110858_student_license_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_license}}', [
            'id' => $this->primaryKey(),
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
        $this->dropTable('{{%student_license}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200831_110858_student_license_table cannot be reverted.\n";

        return false;
    }
    */
}
