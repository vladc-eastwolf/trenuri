<?php

use yii\db\Migration;

/**
 * Class m200901_120612_alter_image_table
 */
class m200901_120612_alter_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('image','size',$this->integer()->defaultValue(null));
        $this->alterColumn('image','extension',$this->string()->defaultValue(null));
        $this->alterColumn('image','user_id',$this->integer()->unique());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('image','size',$this->integer());
        $this->alterColumn('image','extension',$this->string());
        $this->alterColumn('image','user_id',$this->integer()->unique());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200901_120612_alter_image_table cannot be reverted.\n";

        return false;
    }
    */
}
