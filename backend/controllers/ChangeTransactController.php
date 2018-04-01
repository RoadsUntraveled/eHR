<?php

namespace backend\controllers;

use backend\models\Admin;
use backend\models\Business;
use backend\models\SalaryChanges;
use backend\models\Staff;
use Yii;
use yii\db\Exception;
use yii\web\Response;

class ChangeTransactController extends Controller {

    //此控制器管理薪资变动，所以业务类型固定为1，即薪资变动业务
    const BUSINESS_TYPE = 1;

    public function actionIndex() {
        \Yii::$app->response->format = Response::FORMAT_HTML;
        $this->layout = 'main';
        $BusinessModels = Business::findAll(['type' => self::BUSINESS_TYPE, 'status' => 1]);
        return $this->render('index', [
            'BusinessModels' => $BusinessModels
        ]);
    }

    public function actionStart() {
        //创建新的业务
        $BusinessModel = new Business();
        $BusinessModel->staff_id = Admin::getCurrentAdmin()->staff_id;
        $BusinessModel->type = self::BUSINESS_TYPE;
        //默认为status 1
//        $BusinessModel->status = 1;
        //创建薪资变动业务数据行
//        $SalaryChangesModel = new SalaryChanges();
        try {
            $BusinessModel->insert();
            //$this->redirect(Yii::$app->urlManager->createUrl(['change-transact/transact','business_id'=>$BusinessModel->id]));
            $this->response['code'] = 201;
            $this->response['data'] = ['id' => $BusinessModel->id];
            $this->response['msg'] = '业务启动成功!';
        } catch (Exception $exception) {
            $this->response = [
                'code' => 500,
                'msg' => '业务启动失败！'
            ];
        }
        return $this->response;
    }

    public function actionTransact($business_id) {
//        $this->layout = false;
        if ($BusinessModel = Business::findOne(['id' => $business_id])) {
            if (!$SalaryChangesModel = $BusinessModel->salaryChanges) {
                $SalaryChangesModel = new SalaryChanges();
            }
            if ($SalaryChangesModel->load(Yii::$app->request->post())) {
                //业务办理提交请求
            } else {
                //业务办理界面展示
                $this->response['data'] = array_merge($this->response['data'], [
                    'content' => $this->render('transact', [
                        'SalaryChangesModel' => $SalaryChangesModel
                    ]),
                    'title' => '业务办理，薪资变动',
                    'area' => ['880px', '500px'],
                ]);
            }
        } else {
            $this->response = [
                'code' => 404,
                'msg' => '错误的业务ID，该业务不存在!'
            ];
        }
        return $this->response;
    }

    public function actionSelectStaff() {
//        $this->response = [
//            'code' => 204,
//            'msg' => '暂无任何说明信息，建设中...'
//        ];
        $this->response = [
            'code' => 200,
            'msg' => '加载成功！',
            'data' => array_merge($this->response['data'], [
                'content' => $this->render('select-staff', [
                    'SalaryChangesModel' => $SalaryChangesModel
                ]),
                'title' => '业务办理，薪资变动',
                'area' => ['880px', '500px'],
            ])
        ];
        return $this->response;
    }

    public function actionCancel() {
        if ($BusinessModel = Business::findOne(['id' => Yii::$app->request->post('business_id')])) {
            $Transaction = Yii::$app->db->beginTransaction();
            try {
                if ($SalaryChangesModel = SalaryChanges::findOne(['business_id' => $BusinessModel->id])) {
                    $SalaryChangesModel->delete();
                }
                $BusinessModel->delete();
                $Transaction->commit();
                $this->response = [
                    'code' => 204,
                    'msg' => '业务撤销成功!'
                ];

            } catch (Exception $exception) {
                $Transaction->rollBack();
                $this->response = [
                    'code' => 500,
                    'msg' => '业务撤销失败，未知原因!'
                ];
            }
        } else {
            $this->response = [
                'code' => 404,
                'msg' => '错误的业务ID，该业务不存在!'
            ];
        }
        return $this->response;
    }

    public function actionExplain(){

        $this->response = [
            'code' => 204,
            'msg' => '暂无任何说明信息，建设中...',
            'data' => $this->get_staff_tree()
        ];
        return $this->response;
    }

    public function actionTree(){
        $this->response = [
            'code' => 204,
            'msg' => '暂无任何流程图，建设中...'
        ];
        return $this->response;
    }

    private function get_staff_tree(){
        /* @var $StaffModel Staff */
        $StaffTree = [];
        $StaffModels = Staff::find()->all();
        foreach ($StaffModels as $StaffModel){
            $StaffTree[$StaffModel->position->department->name][$StaffModel->position->name] = $StaffModel->attributes;
        }
        return $StaffTree;
    }

}
