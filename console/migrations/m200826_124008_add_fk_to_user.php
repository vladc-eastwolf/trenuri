<?php

use yii\db\Migration;

/**
 * Class m200826_124008_add_fk_to_user
 */
class m200826_124008_add_fk_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_user_image','user','image_id','image','id','cascade','no action');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropForeignKey('fk_user_image','user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200826_124008_add_fk_to_user cannot be reverted.\n";

        return false;
    }
    */
}
