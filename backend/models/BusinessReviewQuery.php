<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[BusinessReview]].
 *
 * @see BusinessReview
 */
class BusinessReviewQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BusinessReview[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BusinessReview|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
