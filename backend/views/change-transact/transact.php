<?php
/* @var $this yii\web\View */
/* @var $SalaryChangesModel \backend\models\SalaryChanges */
?>
<div>
    <div class="change-transact-tool layui-row layui-bg-cyan">
        <div data-operation="selectStaff" class="layui-col-xs1 layui-col-xs-offset1">
            <i></i>选人
        </div>
        <div data-operation="edit" class="layui-col-xs1">编辑</div>
        <div data-operation="calculate" class="layui-col-xs1">计算</div>
        <div data-operation="exportExcel" class="layui-col-xs1">导出</div>
        <div data-operation="printPDF" class="layui-col-xs1">打印</div>
        <div data-operation="viewOpinion" class="layui-col-xs2 layui-col-xs-offset2">查看审批意见</div>
        <div data-operation="submit" class="layui-col-xs1">业务提交</div>
    </div>
    <div class="change-transact-table">
        <div id="salaryChangesView" class="layui-row">

        </div>
    </div>

    <script id="salaryChangesTable" type="text/html">
        <table align="center">
            <thead>
            <tr>
                <th colspan="8">工资变动审批表</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>单位</td>
                <td colspan="7"></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td colspan="2">包佳鑫</td>
                <td colspan="2">身份证号</td>
                <td colspan="3">511623199611037312</td>
            </tr>
            <tr>
                <td>参加工作时间</td>
                <td colspan="2"></td>
                <td>连续工龄</td>
                <td></td>
                <td>到本单位时间</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>所在部门</td>
                <td colspan="2">{{d.department}}</td>
                <td colspan="2">工资变动原因</td>
                <td colspan="3" class="enable"></td>
            </tr>
            <tr>
                <td>批准文件</td>
                <td colspan="3" class="enable"></td>
                <td>依据文件</td>
                <td colspan="3" class="enable"></td>
            </tr>
            <tr>
                <td>项目</td>
                <td colspan="3">调整前状况</td>
                <td colspan="4">调整后状况</td>
            </tr>
            <tr>
                <td>薪级</td>
                <td></td>
                <td>薪等</td>
                <td></td>
                <td>薪级</td>
                <td class="enable"></td>
                <td>薪等</td>
                <td class="enable"></td>
            </tr>
            <tr>
                <td>薪点值</td>
                <td colspan="3"></td>
                <td colspan="4" class="enable"></td>
            </tr>
            <tr>
                <td>基本工资</td>
                <td colspan="3"></td>
                <td colspan="4" class="enable"></td>
            </tr>
            <tr>
                <td>岗位工资</td>
                <td colspan="3"></td>
                <td colspan="4" class="enable"></td>
            </tr>
            <tr>
                <td>绩效工资</td>
                <td colspan="3"></td>
                <td colspan="4" class="enable"></td>
            </tr>
            <tr>
                <td>年功工资</td>
                <td colspan="3"></td>
                <td colspan="4" class="enable"></td>
            </tr>
            <tr>
                <td>呈报单位意见</td>
                <td colspan="3"></td>
                <td>审批单位意见</td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>备注</td>
                <td colspan="7" class="enable">
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="8">人力资源制</td>
            </tr>
            </tbody>
        </table>
    </script>
</div>
<script>
    layui.use(['layer', 'laytpl'], function () {
        var layer = layui.layer;
        var laytpl = layui.laytpl;
        //初始化数据
        var salaryChangesata = <?=json_encode($SalaryChangesModel->attributes)?>;
        var salaryChangesTableTpl = salaryChangesTable.innerHTML
            , salaryChangesView = document.getElementById('salaryChangesView');
        laytpl(salaryChangesTableTpl).render(salaryChangesata, function (html) {
            salaryChangesView.innerHTML = html;
        });

        operation = {
            selectStaff: function () {
                layui.common.loadpage('<?=Yii::$app->urlManager->createUrl('change-transact/select-staff')?>'
                    , {
                        layer: {
                            end: function () {

                            }
                        }
                    });
            }
            , edit: function () {

            }
            , calculate: function () {

            }
            , exportExcel: function () {

            }
            , printPDF: function () {

            }
            , viewOpinion: function () {

            }
            , submit: function () {

            }
        };
        $('.change-transact-tool [data-operation]').on('click', function () {
            var type = $(this).data('operation');
            operation[type] ? operation[type].call(this) : '';
        });
    });
</script>