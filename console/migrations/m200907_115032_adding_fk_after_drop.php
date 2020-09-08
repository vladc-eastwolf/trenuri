<?php

use yii\db\Migration;

/**
 * Class m200907_115032_adding_fk_after_drop
 */
class m200907_115032_adding_fk_after_drop extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_user_image','user','image_id','image','id','set null','cascade');
        $this->addForeignKey('fk_discount_user','discount','user_id','user','id','set null','cascade');
        $this->addForeignKey('fk_discount_student','discount','student_id','student_license','id','set null','cascade');
        $this->addForeignKey('fk_discount_school','discount','school_id','school_license','id','set null','cascade');
        $this->addForeignKey('fk_discount_retired','discount','retired_id','retired_license','id','set null','cascade');
        $this->addForeignKey('fk_discount_identity','discount','identity_card_id','identity_card','id','set null','cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200907_115032_adding_fk_after_drop cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200907_115032_adding_fk_after_drop cannot be reverted.\n";

        return false;
    }
    */
}
