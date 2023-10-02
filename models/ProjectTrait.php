<?php

namespace app\models;

trait ProjectTrait
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name'   => 'Project Name',
            'code'   => 'PID',
            'value'  => 'Value',
            'year'   => 'Year',
            'client' => 'Client',
            'status' => 'Status',
        ];
    }
}
