<?php

use yii\db\Migration;

/**
 * Class m200603_050646_task_created_at
 */
class m200603_050646_task_created_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->addColumn('task', 'created_at', 'DATETIME');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200603_050646_task_created_at cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200603_050646_task_created_at cannot be reverted.\n";

        return false;
    }
    */
}
