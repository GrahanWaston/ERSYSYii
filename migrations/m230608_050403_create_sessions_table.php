<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sessions}}`.
 */
class m230608_050403_create_sessions_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sessions}}', [
            'id' => $this->primaryKey(),
            'status' => $this->integer(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sessions}}');
    }
}
