<?php

use yii\db\Migration;

/**
 * Class m200831_111409_add_fk_to_discount
 */
class m200831_111409_add_fk_to_discount extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_discount_identity', 'discount', 'identity_card_id', 'identity_card', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_discount_student', 'discount', 'student_id', 'student_license', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_discount_school', 'discount', 'school_id', 'school_license', 'id', 'no action', 'no action');
        $this->addForeignKey('fk_discount_retired', 'discount', 'retired_id', 'retired_license', 'id', 'no action', 'no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_discount_retired', 'discount');
        $this->dropForeignKey('fk_discount_school', 'discount');
        $this->dropForeignKey('fk_discount_student', 'discount');
        $this->dropForeignKey('fk_discount_identity', 'discount');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200831_111409_add_fk_to_discount cannot be reverted.\n";

        return false;
    }
    */
}
