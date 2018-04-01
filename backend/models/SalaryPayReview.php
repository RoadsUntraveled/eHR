<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "salary_pay_review".
 *
 * @property integer $salary_pay_id
 *
 * @property SalaryPay $salaryPay
 */
class SalaryPayReview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salary_pay_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salary_pay_id'], 'required'],
            [['salary_pay_id'], 'integer'],
            [['salary_pay_id'], 'exist', 'skipOnError' => true, 'targetClass' => SalaryPay::className(), 'targetAttribute' => ['salary_pay_id' => 'business_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salary_pay_id' => 'Salary Pay ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaryPay()
    {
        return $this->hasOne(SalaryPay::className(), ['business_id' => 'salary_pay_id']);
    }

    /**
     * @inheritdoc
     * @return SalaryPayReviewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalaryPayReviewQuery(get_called_class());
    }
}
