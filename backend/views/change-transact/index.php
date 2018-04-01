<?php
use backend\models\Business;

/* @var $this yii\web\View */
/* @var $BusinessModels Business[] */
?>

<div id="changeTransact" class="layui-row">
    <div class="layui-col-md10 layui-col-md-offset1 layui-col-lg8 layui-col-lg-offset2 box">
        <div class="box-title layui-bg-gray">
            <i class="fa fa-file-archive-o" aria-hidden="true"></i>
            <h4>启动
                <small>(发起事项)</small>
            </h4>
        </div>
        <div class="box-body layui-row">
            <div class="layui-col-md8 box-content">
                <i class="fa fa-file-o"></i>
                <h4 data-type="start" class="operation">薪资变动</h4>
            </div>
            <div class="layui-col-md4 text-right">
                <span data-type="explain" class="layui-btn layui-btn-warm">说明</span>
                <span data-type="tree" class="layui-btn layui-btn-warm">流程图</span>
                <span data-type="start" class="layui-btn layui-btn-normal">启动</span>
            </div>
        </div>
    </div>

    <div class="layui-col-md10 layui-col-md-offset1 layui-col-lg8 layui-col-lg-offset2 box">
        <div class="box-title box-title-white layui-bg-orange">
            <i class="fa fa-hourglass-half" aria-hidden="true"></i>
            <h4>我的待办
                <small>(请抓紧办理)</small>
            </h4>
        </div>
        <?php
        foreach ($BusinessModels as $BusinessModel) {
            echo <<<EOF
        <div data-id="$BusinessModel->id" class="box-body layui-row">
            <div class="layui-col-md8 box-content">
                <i class="fa fa-file-o"></i>
                <h3 data-type="transact">薪资变动-业务办理
                    <small>{$BusinessModel->start_at} {$BusinessModel->staff->position->department->name} {$BusinessModel->staff->name}</small>
                </h3>
            </div>
            <div class="layui-col-md4 text-right">
                <span data-type="cancel" class="layui-btn layui-btn-danger">撤销</span>
                <span data-type="transact" class="layui-btn layui-btn-normal">办理</span>
            </div>
        </div>
EOF;

        }
        ?>
    </div>
</div>
<script>
    window.onload = function () {
        layui.use('layer', function () {
            var layer = layui.layer;


            var operation = {
                explain: function () {
                    layui.common.loadpage('<?=Yii::$app->urlManager->createUrl('change-transact/explain')?>');
                },
                tree: function () {
                    layui.common.loadpage('<?=Yii::$app->urlManager->createUrl('change-transact/tree')?>');
                },
                start: function () {
                    layer.confirm('确定要启动 【薪资变动】 业务吗？', {icon: 3, title: '提示', offset: ['80px']}, function (index) {
                        layui.common.loadpage('<?=Yii::$app->urlManager->createUrl('change-transact/start')?>', {
                            success: function (response) {
                                if (response.code == 201) {
                                    console.log(response.data.id);
                                    //业务启动成功，加载业务处理界面
                                    layui.common.loadpage('<?=Yii::$app->urlManager->createUrl('change-transact/transact')?>'
                                        , {
                                            data: {business_id: response.data.id}
                                            , layer: {
                                                end: function () {
                                                    location.reload()
                                                }
                                            }
                                        });
                                    //本地页面数据更新

                                } else {
                                    layer.alert(response.msg);
                                }
                            }
                        });
                        layer.close(index);
                    })
                },
                cancel: function () {
                    layui.common.loadpage('<?=Yii::$app->urlManager->createUrl('change-transact/cancel')?>'
                        , {
                            data: {business_id: $(this).parent().parent().attr('data-id')}
                            , layer: {
                                end: function () {
                                    location.reload()
                                }
                            }
                        },'post');
                },
                transact: function () {
                    layui.common.loadpage('<?=Yii::$app->urlManager->createUrl('change-transact/transact')?>'
                        , {
                            data: {business_id: $(this).parent().parent().attr('data-id')}
                            , layer: {
                                end: function () {
                                    location.reload()
                                }
                            }
                        });
                }
            };

            $('#changeTransact [data-type]').on('click', function () {
                var type = $(this).data('type');
                operation[type] ? operation[type].call(this) : '';
            });
        });
    };
</script>