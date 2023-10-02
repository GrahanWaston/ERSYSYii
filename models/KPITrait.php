<?php

namespace app\models;

trait KPITrait
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
            'department_id' => 'Department ID',
            'department.name' => 'Department',
            'quantity' => 'Quantity',
            'status' => 'Status',
        ];
    }
}
