<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pa}}`.
 */
class m230608_050339_create_pa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pa}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'month' => $this->integer(),
            'year' => $this->integer(),
            'kpi_id' => $this->integer(),
            'task' => $this->text(),
            'jobdesc' => $this->text(),
            'point' => $this->float(),
            'status' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
        
        // creates index for column `user_id`
        $this->createIndex(
            'index_pa_user_id',
            'pa',
            'user_id'
        );
        
        // creates index for column `kpi_id`
        $this->createIndex(
            'index_pa_kpi_id',
            'pa',
            'kpi_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk_pa_user_id',
            'pa',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        // add foreign key for table `references`
        $this->addForeignKey(
            'fk_pa_kpi_id',
            'pa',
            'kpi_id',
            'references',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pa}}');
    }
}
