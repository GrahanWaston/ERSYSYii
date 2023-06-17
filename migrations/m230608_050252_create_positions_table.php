<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%positions}}`.
 */
class m230608_050252_create_positions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%positions}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'department_id' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            'index_position_department_id',
            'positions',
            'department_id'
        );

        // add foreign key for table `departments`
        $this->addForeignKey(
            'fk_position_department_id',
            'positions',
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
        $this->dropTable('{{%positions}}');
    }
}
