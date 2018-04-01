<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $staff_id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_reset_token
 * @property integer $status
 * @property string $email
 * @property integer $category
 * @property string $created_at
 * @property string $updated_at
 */
class Admin extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['staff_id', 'username', 'password_hash'], 'required'],
            [['status', 'category'], 'integer'],
            [['staff_id'], 'string', 'max' => 11],
            [['created_at', 'updated_at'], 'safe'],
            [['username'], 'string', 'max' => 16],
            [['password_hash'], 'string', 'max' => 60],
            [['auth_key', 'password_reset_token'], 'string', 'max' => 71],
            [['email'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'staff_id' => 'Staff ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'email' => 'Email',
            'category' => 'Category',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return AdminQuery the active query used by this AR class.
     */
    public static function find() {
        return new AdminQuery(get_called_class());
    }

    /**
     * @inheritdoc
     * @return Admin the active query used by this AR class.
     */
    public static function getCurrentAdmin() {
        return self::findOne(['id' => Yii::$app->user->id]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff() {
        return $this->hasOne(Staff::className(), ['id' => 'staff_id']);
    }

}
