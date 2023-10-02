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
            'department_id' => 'Department',
            'position_id' => 'Position',
            'status' => 'Status',
            'activity.name' => 'Activity Name'
        ];
    }

    public function getDataList($filter)
    {
        $query =  self::find()->groupBy('id');
        if ($filter)
            $query->andFilterWhere($filter);
        return $query->all();
    }

    public static function getDepdropOptions($filter)
    {
        $list = self::getDataList($filter);
        foreach ($list as $i => $data) {
            $result[$i]['id']    = $data->id;
            $result[$i]['name']  = $data->name;
        }
        return ($result);
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::class, ['id' => 'position_id']);
    }
}
