<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[SalaryPayReview]].
 *
 * @see SalaryPayReview
 */
class SalaryPayReviewQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SalaryPayReview[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SalaryPayReview|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
