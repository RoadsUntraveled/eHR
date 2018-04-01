<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "salary_pay".
 *
 * @property integer $id
 * @property integer $business_id
 * @property string $date
 * @property integer $times
 * @property string $staff_id
 * @property string $staff_name
 * @property string $staff_hiredate
 * @property string $staff_company
 * @property string $staff_department
 * @property string $staff_position
 * @property string $salary_basic
 * @property string $salary_subsidy
 * @property string $salary_merit
 * @property string $salary_position_overtime
 * @property string $salary_other
 * @property string $salary_seniority
 * @property string $salary_overtime
 * @property string $salary_deduct_late_early
 * @property string $salary_deduct_absenteeism
 * @property string $salary_deduct_sick_leave
 * @property string $salary_deduct_compassionate_leave
 * @property string $salary_fine
 * @property string $salary_reward
 * @property string $salary_pension
 * @property string $salary_medicare
 * @property string $salary_unemployment_insurance
 * @property string $salary_housing_fund
 * @property string $salary_personal_income_tax
 * @property string $salary_separation_allowance
 * @property string $salary_net_payroll
 * @property string $salary_gross
 * @property string $salary_deduct_total
 *
 * @property Business $business
 * @property Staff $staff
 * @property SalaryPayReview $salaryPayReview
 */
class SalaryPay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salary_pay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_id', 'date', 'times', 'staff_id', 'staff_name', 'staff_hiredate', 'staff_company', 'staff_department', 'staff_position'], 'required'],
            [['business_id', 'times'], 'integer'],
            [['staff_hiredate'], 'safe'],
            [['salary_basic', 'salary_subsidy', 'salary_merit', 'salary_position_overtime', 'salary_other', 'salary_seniority', 'salary_overtime', 'salary_deduct_late_early', 'salary_deduct_absenteeism', 'salary_deduct_sick_leave', 'salary_deduct_compassionate_leave', 'salary_fine', 'salary_reward', 'salary_pension', 'salary_medicare', 'salary_unemployment_insurance', 'salary_housing_fund', 'salary_personal_income_tax', 'salary_separation_allowance', 'salary_net_payroll', 'salary_gross', 'salary_deduct_total'], 'number'],
            [['date'], 'string', 'max' => 7],
            [['staff_id'], 'string', 'max' => 11],
            [['staff_name'], 'string', 'max' => 21],
            [['staff_company', 'staff_department', 'staff_position'], 'string', 'max' => 60],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['business_id' => 'id']],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['staff_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'business_id' => 'Business ID',
            'date' => 'Date',
            'times' => 'Times',
            'staff_id' => 'Staff ID',
            'staff_name' => 'Staff Name',
            'staff_hiredate' => 'Staff Hiredate',
            'staff_company' => 'Staff Company',
            'staff_department' => 'Staff Department',
            'staff_position' => 'Staff Position',
            'salary_basic' => 'Salary Basic',
            'salary_subsidy' => 'Salary Subsidy',
            'salary_merit' => 'Salary Merit',
            'salary_position_overtime' => 'Salary Position Overtime',
            'salary_other' => 'Salary Other',
            'salary_seniority' => 'Salary Seniority',
            'salary_overtime' => 'Salary Overtime',
            'salary_deduct_late_early' => 'Salary Deduct Late Early',
            'salary_deduct_absenteeism' => 'Salary Deduct Absenteeism',
            'salary_deduct_sick_leave' => 'Salary Deduct Sick Leave',
            'salary_deduct_compassionate_leave' => 'Salary Deduct Compassionate Leave',
            'salary_fine' => 'Salary Fine',
            'salary_reward' => 'Salary Reward',
            'salary_pension' => 'Salary Pension',
            'salary_medicare' => 'Salary Medicare',
            'salary_unemployment_insurance' => 'Salary Unemployment Insurance',
            'salary_housing_fund' => 'Salary Housing Fund',
            'salary_personal_income_tax' => 'Salary Personal Income Tax',
            'salary_separation_allowance' => 'Salary Separation Allowance',
            'salary_net_payroll' => 'Salary Net Payroll',
            'salary_gross' => 'Salary Gross',
            'salary_deduct_total' => 'Salary Deduct Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusiness()
    {
        return $this->hasOne(Business::className(), ['id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(Staff::className(), ['id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaryPayReview()
    {
        return $this->hasOne(SalaryPayReview::className(), ['salary_pay_id' => 'business_id']);
    }

    /**
     * @inheritdoc
     * @return SalaryPayQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalaryPayQuery(get_called_class());
    }
}
