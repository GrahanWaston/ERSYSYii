<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $department_id
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
            [['name', 'status', 'department_id'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::class, ['id' => 'department_id']);
    }

    /**
     * Gets query for [[Subactivities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubactivityCount()
    {
        return $this->hasMany(Subactivity::class, ['activity_id' => 'id'])->count();
    }
}
