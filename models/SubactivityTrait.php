<?php

namespace app\models;

trait SubactivityTrait
{
    public static function status_options()
    {
        return [
            0 => 'Deactive',
            1 => 'Active',
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'point' => 'Point',
            'activity_id' => 'Activity Name',
            'department_id' => 'Department ID',
            'position_id' => 'Position ID *load based on dept_id',
            'status' => 'Status',
            'activity.name' => 'Activity Name'
        ];
    }
}
