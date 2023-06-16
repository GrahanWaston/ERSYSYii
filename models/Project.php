<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 */
class Project extends \jeemce\models\Model
{
    use ProjectTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'client', 'status'], 'string', 'max' => 64],
            [['value', 'year'], 'integer'],
        ];
    }
}
