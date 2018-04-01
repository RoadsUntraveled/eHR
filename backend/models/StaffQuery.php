<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Staff]].
 *
 * @see Staff
 */
class StaffQuery extends \yii\db\ActiveQuery {
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Staff[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Staff|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

//    public function getGroupByDepartment() {
//        return $this
//            ->leftJoin('position', 'position.id=staff.position_id')
//            ->leftJoin('department', 'department.id=position.department_id')
//            ->select(['staff.*', 'position.name AS position_name', 'department.name AS department_name'])
//            ->orderBy('staff.id ASC')
//            ->asArray()
//            ->all();
//    }
}
