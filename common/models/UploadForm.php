<?php
/**
 * Created by PhpStorm.
 * User: Jassy
 * Date: 2018/1/7
 * Time: 15:52
 */

namespace common\models;


use yii\base\Model;

class UploadForm extends Model {
    public $file;

    public function rules() {
        return [
            [['file'],'file'],
        ];
    }
}