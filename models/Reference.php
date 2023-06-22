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
    use ReferenceTrait;
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
            [['name', 'score'], 'required'],
            [['name', 'status'], 'string', 'max' => 256],
            [['score'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    
}
