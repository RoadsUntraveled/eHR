<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="layui-layout-body side">
<?php $this->beginBody() ?>

<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo pc-nav">eHR—薪资管理</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left pc-nav">
            <li class="layui-nav-item"><a href="<?= Yii::$app->urlManager->createUrl('/') ?>">
                    <i class="fa fa-home"></i>系统首页
                </a></li>
            <li class="layui-nav-item">
                <a href="<?= Yii::$app->urlManager->createUrl('') ?>">
                    <i class="fa fa-user"></i>个人信息</a></li>
            <li class="layui-nav-item">
                <a href="<?= Yii::$app->urlManager->createUrl('') ?>">
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>我的薪酬</a></li>
            <li class="layui-nav-item">
                <a href="<?= Yii::$app->urlManager->createUrl('') ?>">
                    <i class="fa fa-key" aria-hidden="true"></i></i>密码修改</a></li>
        </ul>
        <ul class="layui-nav layui-layout-left mobile-nav">
            <li class="layui-nav-item"><a href="<?= Yii::$app->urlManager->createUrl('/') ?>">
                    <i class="fa fa-home"></i>eHR—薪资管理
                </a></li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item"><a href="javascript:void(0);">
                    <i class="fa fa-envelope"></i>
                </a></li>
            <li class="layui-nav-item"><a href="javascript:void(0);">
                    <i class="fa fa-bell"></i>
                    <!--                    <i class="fa fa-bell-o"></i>-->
                    <!--                    <i class="fa fa-bell-slash-o"></i>-->
                </a></li>
            <li class="layui-nav-item pc-nav">
                <a href="javascript:;">
                    <img src="<?=Url::to('@web/img/3.jpg')?>" class="layui-nav-img">
                    <?= Yii::$app->user->id ?>
                </a>
            </li>
            <li class="layui-nav-item mobile-nav">
                <a href="javascript:;">
                    <img src="<?=Url::to('@web/img/3.jpg')?>" class="layui-nav-img">
                    <?= Yii::$app->user->id ?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href=""><i class="fa fa-user"></i>个人信息</a></dd>
                    <dd><a href=""><i class="fa fa-credit-card-alt" aria-hidden="true"></i>我的薪酬</a></dd>
                    <dd><a href=""><i class="fa fa-key" aria-hidden="true"></i></i>密码修改</a></dd>
                    <dd><a data-target="#signoutForm" href="javascript:layui.signout();"><i class="fa fa-sign-out"
                                                                                    aria-hidden="true"></i>安全退出</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item pc-nav">
                <?= Html::beginForm(['/site/logout'], 'post', ['id' => 'signoutForm']) . Html::endForm() ?>
                <a data-target="#signoutForm" href="javascript:layui.signout();"><i class="fa fa-sign-out"
                                                                            aria-hidden="true"></i>
                    安全退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <div class="side-fold">
                <i class="fa fa-navicon" aria-hidden="true"></i>
            </div>

            <?php
            $menuList = [
                'change' => [
                    'icon' => 'fa-refresh',
                    'name' => '薪资变动',
                    'child' => [
                        'change-transact' => [
                            'icon' => 'fa-file-o',
                            'name' => '业务办理',
                            'url' => 'change-transact',
                        ],
                        'change-transacting' => [
                            'icon' => 'fa-file-text-o',
                            'name' => '办理中的业务',
                            'url' => 'change-transacting',
                        ],
                        'change-history' => [
                            'icon' => 'fa-history',
                            'name' => '历史数据',
                            'url' => 'change-history',
                        ],
                    ]
                ],
                'pay' => [
                    'icon' => 'fa-jpy',
                    'name' => '薪资发放',
                    'child' => [
                        'pay-transact' => [
                            'icon' => 'fa-file-o',
                            'name' => '业务办理',
                            'url' => 'pay-transact',
                        ],
                        'pay-transacting' => [
                            'icon' => 'fa-file-text-o',
                            'name' => '办理中的业务',
                            'url' => 'pay-transacting',
                        ],
                        'pay-history' => [
                            'icon' => 'fa-history',
                            'name' => '历史数据',
                            'url' => 'pay-history',
                        ],
                    ]
                ],
                'salary' => [
                    'icon' => 'fa-table',
                    'name' => '薪资报表',
                    'child' => [
                        'salary-bank' => [
                            'icon' => 'fa-university',
                            'name' => '银行报盘',
                            'url' => 'salary-bank',
                        ],
                        'salary-bill' => [
                            'icon' => 'fa-credit-card',
                            'name' => '工资条',
                            'url' => 'salary-bill',
                        ],
                        'salary-summary' => [
                            'icon' => 'fa-list-alt',
                            'name' => '工资汇总',
                            'url' => 'salary-summary',
                        ],
                    ]
                ],
                'analyse' => [
                    'icon' => 'fa-line-chart',
                    'name' => '薪资分析',
                    'child' => [
                        'analyse-salary' => [
                            'icon' => 'fa-bar-chart',
                            'name' => '薪资分析图',
                            'url' => 'analyse-salary',
                        ]
                    ]
                ],
                'business' => [
                    'icon' => 'fa-android',
                    'name' => '业务查询',
                    'url' => 'business',
                ]
            ];
            ?>
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <?php
                $controller = Yii::$app->controller->id;
                $action = Yii::$app->controller->action->id;

                $currenModule = explode('-', $controller)[0];
//                $menuList[explode('-', $controller)[0]]['itemed'] = 'layui-nav-itemed';
                foreach ($menuList as $module => $menus) {

                    ?>
                    <li class="layui-nav-item <?= $module == $currenModule?'layui-nav-itemed':'' ?>">
                        <a class="" href="<?=(isset($menus['child']))?'javascript:;':Yii::$app->urlManager->createUrl($menus['url'])?>">
                            <i class="fa <?= $menus['icon'] ?>"
                               aria-hidden="true"></i><span><?= $menus['name'] ?></span>
                        </a>
                        <?php
                        if (isset($menus['child'])) {

                            ?>
                            <dl class="layui-nav-child">

                                <?php
                                foreach ($menus['child'] as $key => $menu) {

                                    ?>
                                    <dd class="<?=$controller==$key?'layui-this':''?>"><a href="<?= Yii::$app->urlManager->createUrl($menu['url']) ?>">
                                            <i class="fa <?=$menu['icon']?>" aria-hidden="true"></i><span><?=$menu['name']?></span>
                                        </a></dd>
                                    <?php

                                }
                                ?>
                            </dl>
                            <?php
                        }
                        ?>
                    </li>
                    <?php
                }
                ?>
            </ul>

            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test" style="display: none">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">
                        <i class="fa fa-refresh" aria-hidden="true"></i><span>薪资变动</span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?= Yii::$app->urlManager->createUrl('change-transact') ?>">
                                <i class="fa fa-file-o" aria-hidden="true"></i><span>业务办理</span>
                            </a></dd>
                        <dd><a href="<?= Yii::$app->urlManager->createUrl('change-transacting') ?>">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i><span>办理中的业务</span>
                            </a></dd>
                        <dd><a href="javascript:;">
                                <i class="fa fa-history" aria-hidden="true"></i><span>历史数据</span>
                            </a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <i class="fa fa-jpy" aria-hidden="true"></i><span>薪资发放</span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">
                                <i class="fa fa-file-o" aria-hidden="true"></i><span>业务办理</span>
                            </a></dd>
                        <dd><a href="javascript:;">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i><span>办理中的业务</span>
                            </a></dd>
                        <dd><a href="javascript:;">
                                <i class="fa fa-history" aria-hidden="true"></i><span>历史数据</span>
                            </a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <i class="fa fa-table" aria-hidden="true"></i><span>薪资报表</span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">
                                <i class="fa fa-university" aria-hidden="true"></i><span>银行报盘</span>
                            </a></dd>
                        <dd><a href="javascript:;">
                                <i class="fa fa-credit-card" aria-hidden="true"></i><span>工资条</span>
                            </a></dd>
                        <dd><a href="javascript:;">
                                <i class="fa fa-list-alt" aria-hidden="true"></i><span>工资汇总</span>
                            </a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <i class="fa fa-line-chart" aria-hidden="true"></i><span>薪资分析</span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">
                                <i class="fa fa-bar-chart" aria-hidden="true"></i><span>薪资分析图</span>
                            </a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">
                        <i class="fa fa-android" aria-hidden="true"></i><span>业务查询</span>
                    </a></span></li>
            </ul>
        </div>
    </div>

    <div class="layui-body" style="padding: 15px;">
        <!-- 内容主体区域 -->
        <!--考虑使用Layui布局还是Bootstrap布局-->
        <?= $content ?>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
