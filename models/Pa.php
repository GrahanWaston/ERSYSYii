<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pa".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $reference_id
 * @property string|null $example_activity
 * @property string|null $jobdesk
 * @property int|null $score
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property References $reference
 * @property Users $user
 */
class Pa extends \yii\db\ActiveRecord
{
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
            [['user_id', 'reference_id', 'score'], 'integer'],
            [['example_activity', 'jobdesk'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
            [['reference_id'], 'exist', 'skipOnError' => true, 'targetClass' => References::class, 'targetAttribute' => ['reference_id' => 'id']],
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
            'reference_id' => 'Reference ID',
            'example_activity' => 'Example Activity',
            'jobdesk' => 'Jobdesk',
            'score' => 'Score',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Reference]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReference()
    {
        return $this->hasOne(References::class, ['id' => 'reference_id']);
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
