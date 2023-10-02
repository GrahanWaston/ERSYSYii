<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "KPI".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 */
class Kpi extends \jeemce\models\Model
{
    use KpiTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kpi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'quantity', 'department_id'], 'required'],
            [['name', 'status'], 'string', 'max' => 256],
        ];
    }
    
    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::class, ['id' => 'department_id']);
    }
}
