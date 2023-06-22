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
        return [
            2022 => 2022,
            2023 => 2023,
            2024 => 2024,
            2025 => 2025,
            2026 => 2026
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User',
            'project.name' => 'Project',
            'activity.name' => 'Activity',
            'subactivity.name' => 'Subactivity',
            'month' => 'Month',
            'year' => 'Year',
            'task' => 'Task',
            'progress' => 'Progress',
            'point' => 'Point',
            'note' => 'Note',
            'status' => 'Status',
            'score_adjustment' => 'Score Adjustment',
            'timestamp' => 'Timestamp',
        ];
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
