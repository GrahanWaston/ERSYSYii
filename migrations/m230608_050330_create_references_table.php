<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%references}}`.
 */
class m230608_050330_create_references_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%references}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'score' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%references}}');
    }
}
