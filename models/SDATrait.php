<?php

namespace app\models;

trait SDATrait
{
    public static function status_options()
    {
        return [
            0 => 'Invalid',
            1 => 'Validated',
        ];
    }

    public static function achievement()
    {
        return [
            0 => 'Not Achieved',
            1 => 'Achieved',
        ];
    }

    // public static function summary()
    // {
    //     return static::find()->select(['*', 'SUM(point + score_validation) as total'])->groupBy(['user_id', 'date']);
    // }

    public static function monthly()
    {
        return static::find()->select(['*', 'SUM(point + score_validation) as total', 'MONTH(date) as month'])->where(['status' => 1])->groupBy(['user_id', 'month']);
    }

    public static function summary()
    {
        return static::find()->select([
            '*',
            'COUNT(id) as activity',
            'MONTH(date) as month',
            'SUM(point + score_validation) as total',
            'CASE WHEN SUM(point + score_validation) > 99 THEN 1 ELSE 0 END as achievement',
        ])->groupBy(['user_id', 'date']);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->point = $this->quantity * $this->subactivity->point;
        return true;
    }
}
