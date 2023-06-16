<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230608_050242_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    
    // pk: auto-incremental primary key type (“int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY”).
    // string: string type (“varchar(255)”).
    // text: a long string type (“text”).
    // integer: integer type (“int(11)”).
    // boolean: boolean type (“tinyint(1)”).
    // float: float number type (“float”).
    // decimal: decimal number type (“decimal”).
    // datetime: datetime type (“datetime”).
    // timestamp: timestamp type (“timestamp”).
    // time: time type (“time”).
    // date: date type (“date”).
    // binary: binary data type (“blob”).

    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'email' => $this->string(),
            'department_id' => $this->integer(),
            'position_id' => $this->integer(),
            'status' => $this->integer(),
            'role' => $this->integer(),
            'monitoring' => $this->string(),
            'password' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
