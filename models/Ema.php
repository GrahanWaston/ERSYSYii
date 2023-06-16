<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ema".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $activity_id
 * @property int|null $subactivity_id
 * @property string|null $task
 * @property int|null $progress
 * @property int|null $point
 * @property string|null $note
 * @property int|null $status
 * @property int|null $score_adjustment
 * @property string $timestamp
 *
 * @property Activities $activity
 * @property Subactivities $subactivity
 * @property Users $user
 */
class EMA extends \jeemce\models\Model
{
    use EMATrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ema';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'activity_id', 'subactivity_id', 'progress', 'point', 'status', 'score_adjustment'], 'integer'],
            [['timestamp'], 'safe'],
            [['task', 'note'], 'string', 'max' => 255],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activities::class, 'targetAttribute' => ['activity_id' => 'id']],
            [['subactivity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subactivities::class, 'targetAttribute' => ['subactivity_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * Gets query for [[Activity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activities::class, ['id' => 'activity_id']);
    }

    /**
     * Gets query for [[Subactivity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubactivity()
    {
        return $this->hasOne(Subactivities::class, ['id' => 'subactivity_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}
