<?php

use yii\db\Migration;

/**
 * Class m200603_050040_task_user
 */
class m200603_050040_task_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'user_id', 'INT NOT NULL');
        $this->addForeignKey(
            'fk_task_user',
            'task',
            'user_id',
            'user',
            'id',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200603_050040_task_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200603_050040_task_user cannot be reverted.\n";

        return false;
    }
    */
}
