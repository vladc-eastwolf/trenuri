<?php

use yii\db\Migration;

/**
 * Class m200908_093439_change_operates_to_time
 */
class m200908_093439_change_operates_to_time extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('operates','date_from','time');
        $this->alterColumn('operates','date_to','time');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200908_093439_change_operates_to_time cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200908_093439_change_operates_to_time cannot be reverted.\n";

        return false;
    }
    */
}
