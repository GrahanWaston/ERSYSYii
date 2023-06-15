<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $department_id
 */
class Position extends \jeemce\models\Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'positions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'department_id' => 'Department ID',
        ];
    }
}
