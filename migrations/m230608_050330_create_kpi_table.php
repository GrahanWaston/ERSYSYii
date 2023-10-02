<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kpi}}`.
 */
class m230608_050330_create_kpi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kpi}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'department_id' => $this->integer(),
            'point' => $this->integer(),
            'quantity' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            'index_kpi_department_id',
            'kpi',
            'department_id'
        );

        // add foreign key for table `departments`
        $this->addForeignKey(
            'fk_kpi_department_id',
            'kpi',
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
        $this->dropTable('{{%references}}');
    }
}
