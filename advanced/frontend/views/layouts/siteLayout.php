<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\SiteAsset;
use common\widgets\Alert;

SiteAsset::register($this);
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
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => "E7jele",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        //       $menuItems[] = ['label' => 'My Profile', 'url' => ['user/view']];
        $menuItems[] = [
            'label' => 'Restaurant',
            'items' => [
                ['label' => 'my restaurants', 'url' => '/E7jezle/advanced/frontend/web/restaurant'],
                ['label' => 'my mneus', 'url' => '/E7jezle/advanced/frontend/web/menu'],
                ['label' => 'my items', 'url' => '/E7jezle/advanced/frontend/web/item'],
                ['label' => 'my tables', 'url' => '/E7jezle/advanced/frontend/web/restaurant-table'],
            ],
        ];

        $menuItems[] = [
            'label' => ''.Yii::$app->user->identity->username,
            'items' => [
                ['label' => 'profile', 'url' => 'user/view'],
                '<li>'
                . Html::a(
                    'Logout','#', ['class' =>'logout']
                )
                . '</li>'
            ],
        ];

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= "E7jezle" ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
