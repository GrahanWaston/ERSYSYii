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
            'reference_id' => $this->integer(),
            'example_activity' => $this->string(),
            'jobdesc' => $this->string(),
            'score_employee' => $this->float(),
            'timestamp' => $this->timestamp(),
        ]);
        
        // creates index for column `user_id`
        $this->createIndex(
            'index_pa_user_id',
            'pa',
            'user_id'
        );
        
        // creates index for column `reference_id`
        $this->createIndex(
            'index_pa_reference_id',
            'pa',
            'reference_id'
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
            'fk_pa_reference_id',
            'pa',
            'reference_id',
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
