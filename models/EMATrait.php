<?php

namespace app\models;

trait EMATrait
{
    public static function status_options()
    {
        return [
            0 => 'Deactive',
            1 => 'Active',
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
            'project_id' => 'Project',
            'activity_id' => 'Activity',
            'subactivity_id' => 'Subactivity',
            'task' => 'Task',
            'progress' => 'Progress',
            'point' => 'Point',
            'note' => 'Note',
            'status' => 'Status',
            'score_adjustment' => 'Score Adjustment',
            'timestamp' => 'Timestamp',
        ];
    }
}
