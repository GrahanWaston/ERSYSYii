<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Ema[] $emas
 * @property Sda[] $sdas
 * @property Subactivities[] $subactivities
 */
class Activity extends \yii\db\ActiveRecord
{
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
            [['name'], 'string', 'max' => 128],
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
        ];
    }

    /**
     * Gets query for [[Emas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmas()
    {
        return $this->hasMany(Ema::class, ['activity_id' => 'id']);
    }

    /**
     * Gets query for [[Sdas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSdas()
    {
        return $this->hasMany(Sda::class, ['activity_id' => 'id']);
    }

    /**
     * Gets query for [[Subactivities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubactivities()
    {
        return $this->hasMany(Subactivities::class, ['activity_id' => 'id']);
    }
}
