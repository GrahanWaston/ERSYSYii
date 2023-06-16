<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%validations}}`.
 */
class m230608_050357_create_validations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%validations}}', [
            'id' => $this->primaryKey(),
            'subactivity_id' => $this->integer(),
            'point' => $this->integer(),
            'note' => $this->string(),
        ]);

        // creates index for column `subactivity_id`
        $this->createIndex(
            'index_validation_subactivity_id',
            'validations',
            'subactivity_id'
        );

        // add foreign key for table `subactivities`
        $this->addForeignKey(
            'fk_validation_subactivity_id',
            'validations',
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
        $this->dropTable('{{%validations}}');
    }
}
