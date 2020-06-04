<?php

use yii\db\Migration;

/**
 * Class m200604_042437_task_parent
 */
class m200604_042437_task_parent extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'parent_id', 'INT DEFAULT NULL');
        $this->addForeignKey(
            'fk_task_parent',
            'task',
            'parent_id',
            'task',
            'id',
            'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200604_042437_task_parent cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200604_042437_task_parent cannot be reverted.\n";

        return false;
    }
    */
}
