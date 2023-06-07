<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "references".
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $score
 */
class Reference extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'references';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['score'], 'number'],
            [['name'], 'string', 'max' => 256],
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
        ];
    }
}
