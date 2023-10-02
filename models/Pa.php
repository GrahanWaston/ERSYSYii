<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pa".
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
 * @property Activity $activity
 * @property Subactivity $subactivity
 * @property Users $user
 */
class PA extends \jeemce\models\Model
{
    use PATrait;
    public $total;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'kpi_id'], 'integer'],
            [['task', 'jobdesc'], 'string'],
            [['created_at', 'updated_at', 'point', 'month', 'year'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
            [['kpi_id'], 'exist', 'skipOnError' => true, 'targetClass' => KPI::class, 'targetAttribute' => ['kpi_id' => 'id']],
        ];
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

    public function getKpi()
    {
        return $this->hasOne(KPI::class, ['id' => 'kpi_id']);
    }

}
