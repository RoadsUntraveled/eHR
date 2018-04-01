<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "business".
 *
 * @property integer $id
 * @property string $staff_id
 * @property integer $type
 * @property integer $status
 * @property string $start_at
 * @property string $end_at
 * @property string $remarks
 *
 * @property Staff $staff
 * @property BusinessReview $businessReview
 * @property SalaryChanges $salaryChanges
 * @property SalaryPay[] $salaryPays
 */
class Business extends \yii\db\ActiveRecord
{
    public static $typeList = [
        1 => '薪资变动',
        2 => '薪资发放'
    ];
    public static $statusList = [
        1 => '业务办理',
        2 => '呈报单位',
        3 => '审批单位'
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id', 'type'], 'required'],
            [['type', 'status'], 'integer'],
            [['start_at', 'end_at'], 'safe'],
            [['remarks'], 'string'],
            [['staff_id'], 'string', 'max' => 11],
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
            'staff_id' => 'Staff ID',
            'type' => 'Type',
            'status' => 'Status',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'remarks' => 'Remarks',
        ];
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
    public function getBusinessReview()
    {
        return $this->hasOne(BusinessReview::className(), ['business_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaryChanges()
    {
        return $this->hasOne(SalaryChanges::className(), ['business_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaryPays()
    {
        return $this->hasMany(SalaryPay::className(), ['business_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return BusinessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BusinessQuery(get_called_class());
    }
}
