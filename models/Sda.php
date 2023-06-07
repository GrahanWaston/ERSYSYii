<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sda".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $user_id
 * @property int|null $activity_id
 * @property int|null $subactivity_id
 * @property string|null $task
 * @property int|null $qty
 * @property float|null $point
 * @property string|null $note
 * @property string|null $status
 * @property float|null $score_adjustment
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Activities $activity
 * @property Subactivities $subactivity
 * @property Users $user
 */
class Sda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'user_id', 'activity_id', 'subactivity_id', 'qty'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['task', 'note'], 'string'],
            [['point', 'score_adjustment'], 'number'],
            [['status'], 'string', 'max' => 32],
            [['id'], 'unique'],
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
            'date' => 'Date',
            'user_id' => 'User ID',
            'activity_id' => 'Activity ID',
            'subactivity_id' => 'Subactivity ID',
            'task' => 'Task',
            'qty' => 'Qty',
            'point' => 'Point',
            'note' => 'Note',
            'status' => 'Status',
            'score_adjustment' => 'Score Adjustment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
