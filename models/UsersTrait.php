<?php

namespace app\models;

trait UsersTrait
{
    public function getDepartment(){
        return $this->hasOne(Department::class, ['id' => 'department_id']);
    }

    public function getPosition(){
        return $this->hasOne(Position::class, ['id' => 'position_id']);
    }
}