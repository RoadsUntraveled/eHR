<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\GuestAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'eHR登录';

GuestAsset::register($this);
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
<body class="layui-layout-body">
<?php $this->beginBody() ?>
<?= $content ?>
<script>

    /*
     Fullscreen background
     */
     window.bgConfig = {Url:[
         '<?=Url::to("@web/img/signin/2.jpg")?>',
         '<?=Url::to("@web/img/signin/3.jpg")?>',
         '<?=Url::to("@web/img/signin/1.jpg")?>'
     ], config:{duration: 3000, fade: 750}};
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
