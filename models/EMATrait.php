<?php

namespace app\models;

trait EMATrait
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

    public static function month_options()
    {
        return [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
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
            'user_id' => 'User',
            'project_id' => 'Project',
            'project.name' => 'Project',
            'activity_id' => 'Activity',
            'activity.name' => 'Activity',
            'subactivity_id' => 'Subactivity',
            'subactivity.name' => 'Subactivity',
            'month' => 'Month',
            'year' => 'Year',
            'task' => 'Task',
            'progress' => 'Progress',
            'point' => 'Point',
            'note' => 'Note',
            'status' => 'Status',
            'score_validation' => 'Score Validation',
            'timestamp' => 'Timestamp',
        ];
    }

    public static function summary()
    {
        return static::find()->select(['*', 'SUM(point + score_validation) as total'])->groupBy(['user_id', 'month']);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->point = ($this->progress / 100) * $this->subactivity->point;
        return true;
    }
}
