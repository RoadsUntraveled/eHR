<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "business_review".
 *
 * @property integer $business_id
 * @property integer $type
 * @property string $staff_id
 * @property integer $status
 * @property string $start_at
 * @property string $end_at
 * @property string $remarks
 *
 * @property Business $business
 * @property Staff $staff
 */
class BusinessReview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_id', 'staff_id', 'start_at'], 'required'],
            [['business_id', 'type', 'status'], 'integer'],
            [['start_at', 'end_at'], 'safe'],
            [['remarks'], 'string'],
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
            'type' => 'Type',
            'staff_id' => 'Staff ID',
            'status' => 'Status',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'remarks' => 'Remarks',
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
     * @return BusinessReviewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BusinessReviewQuery(get_called_class());
    }
}
