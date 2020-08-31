<?php

use yii\db\Migration;

/**
 * Class m200827_101358_student_license_table
 */
class m200827_101358_student_license_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_license}}', [
            'id' => $this->primaryKey(),
            'discount_id' => $this->integer()->notNull(),
            'license_front' => $this->string(),
            'license_back' => $this->string(),
            'send_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->addForeignKey('fk_stud_lic_discount', 'student_license', 'discount_id', 'discount', 'id', 'no action', 'no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_stud_lic_discount', 'student_license');
        $this->dropTable('{{%student_license}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200827_101358_student_license_table cannot be reverted.\n";

        return false;
    }
    */
}
