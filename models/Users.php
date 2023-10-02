<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property int|null $department_id
 * @property int|null $position_id
 * @property int|null $status
 * @property int|null $role
 * @property string|null $monitoring
 * @property string|null $password
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Ema[] $emas
 * @property Pa[] $pas
 * @property Sda[] $sdas
 */
class Users extends \jeemce\models\Model
{
    use UsersTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_id', 'position_id', 'status', 'role'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'monitoring', 'password'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'department_id' => 'Department ID',
            'position_id' => 'Position ID',
            'status' => 'Status',
            'role' => 'Role',
            'monitoring' => 'Monitoring',
            'password' => 'Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Emas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmas()
    {
        return $this->hasMany(Ema::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Pas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPas()
    {
        return $this->hasMany(Pa::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Sdas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSdas()
    {
        return $this->hasMany(Sda::class, ['user_id' => 'id']);
    }
}
