<?php

namespace app\models;

use Yii;
use app\models\Activity;

/**
 * This is the model class for table "subactivities".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $point
 * @property int|null $activity_id
 * @property int|null $department_id
 * @property string|null $position_id
 * @property int|null $status
 *
 * @property Activity $activity
 */
class Subactivity extends \jeemce\models\Model
{
    use SubactivityTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subactivities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['point', 'activity_id', 'department_id', 'status', 'position_id'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activity::class, 'targetAttribute' => ['activity_id' => 'id']],
        ];
    }

    /**
     * Gets query for [[Activity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::class, ['id' => 'activity_id']);
    }
}
