<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subactivities}}`.
 */
class m230608_050307_create_subactivities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subactivities}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'point' => $this->integer(),
            'activity_id' => $this->integer(),
            'position_id' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `activity_id`
        $this->createIndex(
            'index_subactivity_activity_id',
            'subactivities',
            'activity_id'
        );

        // creates index for column `position_id`
        $this->createIndex(
            'index_subactivity_position_id',
            'subactivities',
            'position_id'
        );

        // add foreign key for table `activities`
        $this->addForeignKey(
            'fk_subactivity_activity_id',
            'subactivities',
            'activity_id',
            'activities',
            'id',
            'CASCADE'
        );

        // add foreign key for table `positions`
        $this->addForeignKey(
            'fk_subactivity_position_id',
            'subactivities',
            'position_id',
            'positions',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subactivities}}');
    }
}
