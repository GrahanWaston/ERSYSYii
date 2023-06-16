<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sda}}`.
 */
class m230608_050323_create_sda_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sda}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date(),
            'user_id' => $this->integer(),
            'activity_id' => $this->integer(),
            'subactivity_id' => $this->integer(),
            'task' => $this->string(),
            'quantity' => $this->integer(),
            'point' => $this->integer(),
            'note' => $this->string(),
            'status' => $this->integer(),
            'score_adjustment' => $this->integer(),
            'timestamp' => $this->timestamp(),
        ]);
        
        // creates index for column `user_id`
        $this->createIndex(
            'index_sda_user_id',
            'sda',
            'user_id'
        );
        
        // creates index for column `activity_id`
        $this->createIndex(
            'index_sda_activity_id',
            'sda',
            'activity_id'
        );
        
        // creates index for column `subactivity_id`
        $this->createIndex(
            'index_sda_subactivity_id',
            'sda',
            'subactivity_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk_sda_user_id',
            'sda',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        // add foreign key for table `activities`
        $this->addForeignKey(
            'fk_sda_activity_id',
            'sda',
            'activity_id',
            'activities',
            'id',
            'CASCADE'
        );

        // add foreign key for table `subactivities`
        $this->addForeignKey(
            'fk_sda_subactivity_id',
            'sda',
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
        $this->dropTable('{{%sda}}');
    }
}
