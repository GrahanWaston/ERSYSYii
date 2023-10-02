<?php

namespace app\models;

use Yii;
use app\models\SDATrait;

/**
 * This is the model class for table "sda".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $user_id
 * @property int|null $activity_id
 * @property int|null $subactivity_id
 * @property string|null $task
 * @property int|null $quantity
 * @property float|null $point
 * @property string|null $note
 * @property string|null $status
 * @property float|null $score_validation
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Activity $activity
 * @property Subactivity $subactivity
 * @property Users $user
 */
class SDA extends \jeemce\models\Model
{
    use SDATrait;
    
    public $total, $month;

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
            [['date', 'activity_id', 'subactivity_id', 'task', 'quantity'], 'required'],
            [['id', 'user_id', 'activity_id', 'subactivity_id'], 'integer'],
            [['created_at', 'updated_at', 'status', 'quantity'], 'safe'],
            [['task', 'note'], 'string'],
            [['point', 'score_validation'], 'number'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activity::class, 'targetAttribute' => ['activity_id' => 'id']],
            [['subactivity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subactivity::class, 'targetAttribute' => ['subactivity_id' => 'id']],
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
            'user_id' => 'User',
            'activity_id' => 'Activity',
            'subactivity_id' => 'Subactivity',
            'task' => 'Task',
            'quantity' => 'Quantity',
            'point' => 'Point',
            'note' => 'Note',
            'status' => 'Status',
            'score_validation' => 'Score Validation',
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
        return $this->hasOne(Activity::class, ['id' => 'activity_id']);
    }

    /**
     * Gets query for [[Subactivity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubactivity()
    {
        return $this->hasOne(Subactivity::class, ['id' => 'subactivity_id']);
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
