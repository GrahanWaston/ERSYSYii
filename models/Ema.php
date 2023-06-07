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
 * @property string|null $status
 * @property int|null $score_adjustment
 * @property string|null $created_at
 * @property string|null $Updated_at
 *
 * @property Activities $activity
 * @property Subactivities $subactivity
 * @property Users $user
 */
class Ema extends \yii\db\ActiveRecord
{
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
            [['user_id', 'activity_id', 'subactivity_id', 'progress', 'point', 'score_adjustment'], 'integer'],
            [['task', 'note'], 'string'],
            [['created_at', 'Updated_at'], 'safe'],
            [['status'], 'string', 'max' => 32],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activities::class, 'targetAttribute' => ['activity_id' => 'id']],
            [['subactivity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subactivities::class, 'targetAttribute' => ['subactivity_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'activity_id' => 'Activity ID',
            'subactivity_id' => 'Subactivity ID',
            'task' => 'Task',
            'progress' => 'Progress',
            'point' => 'Point',
            'note' => 'Note',
            'status' => 'Status',
            'score_adjustment' => 'Score Adjustment',
            'created_at' => 'Created At',
            'Updated_at' => 'Updated At',
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
