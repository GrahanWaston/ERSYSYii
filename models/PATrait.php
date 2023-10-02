<?php

namespace app\models;

trait PATrait
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
            0 => 'Sangat Buruk',
            1 => 'Buruk',
            2 => 'Cukup',
            3 => 'Baik',
            4 => 'Sangat Baik',
        ];
    }

    public static function month_options()
    {
        return [
            // 1 => 'January',
            // 2 => 'February',
            3 => 'Quartil I - March',
            // 4 => 'April',
            // 5 => 'May',
            6 => 'Quartil II - June',
            // 7 => 'July',
            // 8 => 'August',
            9 => 'Quartil III - September',
            // 10 => 'October',
            // 11 => 'November',
            12 => 'Quartil IV - December',
        ];
    }

    public static function year_options()
    {
        $options = [];
        $j = 0;
        for ($i = date('Y'); $i >= 2022; $i--) {
            $options[$i] = $i;
            $options[$i] = $i;
            $j++;
        }
        return $options;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Name',
            'month' => 'Month',
            'year' => 'Year',
            'kpi_id' => 'KPI',
            'reference.name' => 'KPI',
            'task' => 'Task',
            'jobdesc' => 'Jobdesc',
            'point' => 'Point',
        ];
    }

    public static function summary()
    {
        return static::find()->select(['*', 'SUM(point) as total'])->groupBy(['user_id', 'month']);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $kpi = KPI::find()->where(['id' => $this->kpi_id])->one();
        $this->point = ($this->point * $kpi['quantity']) / 100;
        return true;
    }
}
