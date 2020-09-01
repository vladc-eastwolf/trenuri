<?php

use yii\db\Migration;

/**
 * Class m200901_065724_add_discount_role_to_user
 */
class m200901_065724_add_discount_role_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','discount',$this->string()->after('status')->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','discount');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200901_065724_add_discount_role_to_user cannot be reverted.\n";

        return false;
    }
    */
}
