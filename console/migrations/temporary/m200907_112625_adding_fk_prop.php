<?php

use yii\db\Migration;

/**
 * Class m200907_112625_adding_fk_prop
 */
class m200907_112625_adding_fk_prop extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_user_image','user');
        $this->dropForeignKey('fk_discount_user','discount');
        $this->dropForeignKey('fk_discount_student','discount');
        $this->dropForeignKey('fk_discount_school','discount');
        $this->dropForeignKey('fk_discount_retired','discount');
        $this->dropForeignKey('fk_discount_identity','discount');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200907_112625_adding_fk_prop cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200907_112625_adding_fk_prop cannot be reverted.\n";

        return false;
    }
    */
}
