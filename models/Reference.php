<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "References".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 */
class Reference extends \jeemce\models\Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'references';
    }

    public static function status_options()
    {
        return [
            0 => 'Deactive',
            1 => 'Active',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'string', 'max' => 256],
            [['score'], 'integer'],
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
            'score' => 'Score',
            'status' => 'Status',
        ];
    }
}
