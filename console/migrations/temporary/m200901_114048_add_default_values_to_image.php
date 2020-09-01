<?php

use yii\db\Migration;

/**
 * Class m200901_114048_add_default_values_to_image
 */
class m200901_114048_add_default_values_to_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('image','size',$this->integer()->defaultValue(null));
        $this->alterColumn('image','extension',$this->string()->defaultValue(null));
        $this->alterColumn('image','user_id',$this->integer()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200901_114048_add_default_values_to_image cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200901_114048_add_default_values_to_image cannot be reverted.\n";

        return false;
    }
    */
}
