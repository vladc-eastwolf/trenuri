<?php

use yii\db\Migration;

/**
 * Class m200828_121906_new_stud_lic_table
 */
class m200828_121906_new_stud_lic_table extends Migration
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
            'mime_type'=>$this->string()
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
        echo "m200828_121906_new_stud_lic_table cannot be reverted.\n";

        return false;
    }
    */
}
