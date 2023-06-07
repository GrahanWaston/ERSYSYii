<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subactivities".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $point
 * @property int|null $activity_id
 * @property int|null $departement_id
 * @property int|null $position_id
 * @property string|null $status
 *
 * @property Activities $activity
 * @property Departement $departement
 * @property Ema[] $emas
 * @property Positions $position
 * @property Sda[] $sdas
 */
class Subactivity extends \yii\db\ActiveRecord
{
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
            [['point', 'activity_id', 'departement_id', 'position_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['status'], 'string', 'max' => 64],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activities::class, 'targetAttribute' => ['activity_id' => 'id']],
            [['departement_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departement::class, 'targetAttribute' => ['departement_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Positions::class, 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'point' => 'Point',
            'activity_id' => 'Activity ID',
            'departement_id' => 'Departement ID',
            'position_id' => 'Position ID',
            'status' => 'Status',
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
     * Gets query for [[Departement]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartement()
    {
        return $this->hasOne(Departement::class, ['id' => 'departement_id']);
    }

    /**
     * Gets query for [[Emas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmas()
    {
        return $this->hasMany(Ema::class, ['subactivity_id' => 'id']);
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Positions::class, ['id' => 'position_id']);
    }

    /**
     * Gets query for [[Sdas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSdas()
    {
        return $this->hasMany(Sda::class, ['subactivity_id' => 'id']);
    }
}
