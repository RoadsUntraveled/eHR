<?php

namespace backend\controllers;

use yii\base\Module;
use yii\web\Response;

abstract class Controller extends \yii\web\Controller {

    public $layout = false;
    public $response = [
        'code' => 200,
        'msg' => '加载成功！',
        'data' => [
            'type' => 1,
            'content' => '',
//            'title' => '',
//            'skin' => '',
//            'area' => ['500px', '300px'],
            'maxmin' => 'true',
//            'offset' => '',
            'scrollbar ' => 'false',
//            'shade' => 0,
            'maxWidth' => '500px',
            'maxHeight' => '500px',
//            'shadeClose' => 'true',
        ]
    ];

    public function __construct($id, Module $module, array $config = []) {
        parent::__construct($id, $module, $config);
        \Yii::$app->response->format = Response::FORMAT_JSON;
    }

//    public function sendJson() {
//        \Yii::$app->response->format = Response::FORMAT_JSON;
//        return $this->response;
//    }
}
