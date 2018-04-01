<?php
/**
 * Created by PhpStorm.
 * User: Jassy
 * Date: 2018/3/30
 * Time: 22:40
 */

namespace backend\models\forms;


use backend\models\Staff;

class StaffTree extends Staff {
    public $position_name;
    public $department_name;
    public $department_id;

    /**
     * @return array|Staff[]
     */
    public function getGroupByDepartment() {
        return self::find()
            ->leftJoin('position', 'position.id=staff.position_id')
            ->leftJoin('department', 'department.id=position.department_id')
            ->select(['staff.*', 'position.name AS position_name', 'department.name AS department_name'])
            ->orderBy('staff.id ASC')
            ->all();
    }
}