<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "salary_changes".
 *
 * @property integer $business_id
 * @property string $staff_id
 * @property string $reason
 * @property integer $salary_grade
 * @property integer $salary_rank
 * @property integer $salary_point
 * @property string $salary_basic
 * @property string $salary_position
 * @property string $salary_merit
 * @property string $salary_seniority
 * @property integer $old_salary_grade
 * @property integer $old_salary_rank
 * @property integer $old_salary_point
 * @property string $old_salary_basic
 * @property string $old_salary_position
 * @property string $old_salary_merit
 * @property string $old_salary_seniority
 *
 * @property Business $business
 * @property Staff $staff
 */
class SalaryChanges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salary_changes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_id', 'staff_id', 'old_salary_grade', 'old_salary_rank', 'old_salary_basic', 'old_salary_position', 'old_salary_merit', 'old_salary_seniority'], 'required'],
            [['business_id', 'salary_grade', 'salary_rank', 'salary_point', 'old_salary_grade', 'old_salary_rank', 'old_salary_point'], 'integer'],
            [['reason'], 'string'],
            [['salary_basic', 'salary_position', 'salary_merit', 'salary_seniority', 'old_salary_basic', 'old_salary_position', 'old_salary_merit', 'old_salary_seniority'], 'number'],
            [['staff_id'], 'string', 'max' => 11],
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
            'business_id' => 'Business ID',
            'staff_id' => 'Staff ID',
            'reason' => 'Reason',
            'salary_grade' => 'Salary Grade',
            'salary_rank' => 'Salary Rank',
            'salary_point' => 'Salary Point',
            'salary_basic' => 'Salary Basic',
            'salary_position' => 'Salary Position',
            'salary_merit' => 'Salary Merit',
            'salary_seniority' => 'Salary Seniority',
            'old_salary_grade' => 'Old Salary Grade',
            'old_salary_rank' => 'Old Salary Rank',
            'old_salary_point' => 'Old Salary Point',
            'old_salary_basic' => 'Old Salary Basic',
            'old_salary_position' => 'Old Salary Position',
            'old_salary_merit' => 'Old Salary Merit',
            'old_salary_seniority' => 'Old Salary Seniority',
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
     * @inheritdoc
     * @return SalaryChangesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalaryChangesQuery(get_called_class());
    }
}
