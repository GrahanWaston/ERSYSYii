<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property int $id
 * @property string|null $name
 * @property int $status
 */
class Activity extends \jeemce\models\Model
{
    use ActivityTrait;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * Gets query for [[Subactivities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubactivityCount()
    {
        return $this->hasMany(Subactivity::class, ['id' => 'subactivity_id'])->count();
    }
}
