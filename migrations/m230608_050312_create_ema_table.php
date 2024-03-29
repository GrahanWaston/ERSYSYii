<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ema}}`.
 */
class m230608_050312_create_ema_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ema}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'project_id' => $this->integer(),
            'activity_id' => $this->integer(),
            'subactivity_id' => $this->integer(),
            'month' => $this->integer(),
            'year' => $this->integer(),
            'task' => $this->string(),
            'progress' => $this->integer(),
            'point' => $this->integer(),
            'note' => $this->string(),
            'status' => $this->integer(),
            'score_validation' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'index_ema_user_id',
            'ema',
            'user_id'
        );
        
        // creates index for column `project_id`
        $this->createIndex(
            'index_ema_project_id',
            'ema',
            'project_id'
        );
        
        // creates index for column `activity_id`
        $this->createIndex(
            'index_ema_activity_id',
            'ema',
            'activity_id'
        );
        
        // creates index for column `subactivity_id`
        $this->createIndex(
            'index_ema_subactivity_id',
            'ema',
            'subactivity_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk_ema_user_id',
            'ema',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        // add foreign key for table `projects`
        $this->addForeignKey(
            'fk_ema_project_id',
            'ema',
            'project_id',
            'projects',
            'id',
            'CASCADE'
        );

        // add foreign key for table `activities`
        $this->addForeignKey(
            'fk_ema_activity_id',
            'ema',
            'activity_id',
            'activities',
            'id',
            'CASCADE'
        );

        // add foreign key for table `subactivities`
        $this->addForeignKey(
            'fk_ema_subactivity_id',
            'ema',
            'subactivity_id',
            'subactivities',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ema}}');
    }
}
