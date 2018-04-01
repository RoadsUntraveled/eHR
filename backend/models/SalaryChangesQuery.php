<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[SalaryChanges]].
 *
 * @see SalaryChanges
 */
class SalaryChangesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SalaryChanges[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SalaryChanges|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
