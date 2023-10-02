<?php

namespace app\models;

use Yii;
use app\models\Subactivity;

trait ActivityTrait
{
    public static function status_options()
    {
        return [
            0 => 'Deactive',
            1 => 'Active',
        ];
    }

    public static function year_options()
    {
        return [
            2023 => 2023,
            2024 => 2024,
            2025 => 2025,
            2026 => 2026,
            2027 => 2027,
            2028 => 2028,
        ];
    }
    
    public function attributeLabels()
    {        
        return [
            'id' => 'ID',
            'name' => 'Name',
            'department_id' => 'Department',
            'status' => 'Status',
        ];
    }
    

    public static function getDataOptions()
    {
        return Activity::Options('id', 'name');
    }
}
