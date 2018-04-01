<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;

$this->context->layout = Yii::$app->user->isGuest ? 'main2' : 'main';
?>
<style>
    body {
        /*background-color: #e6e6e6;*/
        background-color: black;32
    }

    .error-guest {
        border-width: 1px;
        border-style: solid;
        border-radius: 2px;
        box-shadow: 0px 0px 30px 10px rgba(255, 255, 255, .6);
        border-color: #e6e6e6;
        margin: 10px;
        padding: 30px;
        display: inline-block;
        background-color: #eee;
        /* box-sizing: border-box; */
    }
</style>
<div class="site-error" style="display: none">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
<div style="text-align: center; margin:11% 0;">

    <div class="<?= Yii::$app->user->isGuest ? 'error-guest' : '' ?>">
        <?php
        $message = nl2br(Html::encode($message));
        if (Yii::$app->response->statusCode == 404) {
            $homeUrl = Yii::$app->urlManager->createUrl('site');
            echo <<<EOF
    <i class="layui-icon" style="line-height:20rem; font-size:20rem; color: #393D50;"><!--&#xe61c;--></i>
    <p style="font-size: 20px; font-weight: 300; color: #999;">我勒个去，页面被外星人挟持了!</p>
    <a href="{$homeUrl}"><i class="fa fa-home">返回首页</i> </a>
EOF;
        } else {
            echo <<<EOF
    <i class="layui-icon" style="line-height:10rem; font-size:10rem; color: #393D50;">&#x1007;503</i>
    <p style="font-size: 20px; font-weight: 300; color: #999;">{$message}</p>
EOF;

        }
        ?>
    </div>

</div>
