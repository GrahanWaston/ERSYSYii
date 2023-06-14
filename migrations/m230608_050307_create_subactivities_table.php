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
            'department_id' => $this->integer(),
            'position_id' => $this->integer(),
            'status' => $this->integer(),
        ]);

        // creates index for column `activity_id`
        // $this->createIndex(
        //     'index_subactivity_activity_id',
        //     'subactivities',
        //     'activity_id'
        // );

        // creates index for column `department_id`
        // $this->createIndex(
        //     'index_subactivity_department_id',
        //     'subactivities',
        //     'department_id'
        // );

        // creates index for column `position_id`
        // $this->createIndex(
        //     'index_subactivity_position_id',
        //     'subactivities',
        //     'position_id'
        // );

        // add foreign key for table `activities`
        // $this->addForeignKey(
        //     'fk_subactivity_activity_id',
        //     'activities',
        //     'id',
        //     'subactivities',
        //     'activity_id',
        //     'CASCADE'
        // );

        // add foreign key for table `departments`
        // $this->addForeignKey(
        //     'fk_subactivity_department_id',
        //     'departments',
        //     'id',
        //     'subactivities',
        //     'department_id',
        //     'CASCADE'
        // );

        // add foreign key for table `positions`
        // $this->addForeignKey(
        //     'fk_subactivity_position_id',
        //     'positions',
        //     'id',
        //     'subactivities',
        //     'position_id',
        //     'CASCADE'
        // );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subactivities}}');
    }
}
