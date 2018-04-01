<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property string $id
 * @property string $id_number
 * @property string $name
 * @property string $hiredate
 * @property integer $position_id
 * @property string $work_time
 * @property integer $seniority
 * @property string $education
 * @property string $nation
 * @property string $politics
 * @property string $native_place
 * @property string $birth_date
 *
 * @property Business[] $businesses
 * @property BusinessReview[] $businessReviews
 * @property Salary $salary
 * @property SalaryChanges[] $salaryChanges
 * @property SalaryPay[] $salaryPays
 * @property Position $position
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'hiredate', 'position_id'], 'required'],
            [['hiredate', 'work_time', 'birth_date'], 'safe'],
            [['position_id', 'seniority'], 'integer'],
            [['id'], 'string', 'max' => 11],
            [['id_number'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 21],
            [['education'], 'string', 'max' => 6],
            [['nation', 'politics'], 'string', 'max' => 12],
            [['native_place'], 'string', 'max' => 255],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_number' => 'Id Number',
            'name' => 'Name',
            'hiredate' => 'Hiredate',
            'position_id' => 'Position ID',
            'work_time' => 'Work Time',
            'seniority' => 'Seniority',
            'education' => 'Education',
            'nation' => 'Nation',
            'politics' => 'Politics',
            'native_place' => 'Native Place',
            'birth_date' => 'Birth Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinesses()
    {
        return $this->hasMany(Business::className(), ['staff_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessReviews()
    {
        return $this->hasMany(BusinessReview::className(), ['staff_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalary()
    {
        return $this->hasOne(Salary::className(), ['satff_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaryChanges()
    {
        return $this->hasMany(SalaryChanges::className(), ['staff_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaryPays()
    {
        return $this->hasMany(SalaryPay::className(), ['staff_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * @inheritdoc
     * @return StaffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StaffQuery(get_called_class());
    }
}
