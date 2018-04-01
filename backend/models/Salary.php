<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "salary".
 *
 * @property string $satff_id
 * @property integer $salary_grade
 * @property integer $salary_rank
 * @property integer $salary_point
 * @property string $salary_basic
 * @property string $salary_position
 * @property string $salary_merit
 * @property string $salary_seniority
 *
 * @property Staff $satff
 */
class Salary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['satff_id'], 'required'],
            [['salary_grade', 'salary_rank', 'salary_point'], 'integer'],
            [['salary_basic', 'salary_position', 'salary_merit', 'salary_seniority'], 'number'],
            [['satff_id'], 'string', 'max' => 11],
            [['satff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['satff_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'satff_id' => 'Satff ID',
            'salary_grade' => 'Salary Grade',
            'salary_rank' => 'Salary Rank',
            'salary_point' => 'Salary Point',
            'salary_basic' => 'Salary Basic',
            'salary_position' => 'Salary Position',
            'salary_merit' => 'Salary Merit',
            'salary_seniority' => 'Salary Seniority',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatff()
    {
        return $this->hasOne(Staff::className(), ['id' => 'satff_id']);
    }

    /**
     * @inheritdoc
     * @return SalaryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalaryQuery(get_called_class());
    }
}
