<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activities}}`.
 */
class m230608_050301_create_activities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%activities}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'department_id' => $this->integer(),
            'status' => $this->string(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            'index_activity_department_id',
            'activities',
            'department_id'
        );

        // add foreign key for table `departments`
        $this->addForeignKey(
            'fk_activity_department_id',
            'activities',
            'department_id',
            'departments',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%activities}}');
    }
}
