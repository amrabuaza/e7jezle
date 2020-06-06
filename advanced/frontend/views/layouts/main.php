<?php

/* @var $this \yii\web\View */

/* @var $content string */


use backend\models\Newsletter;
use frontend\helper\Constants;
use frontend\helper\HelperMethods;
use frontend\models\UserModels\UserItemWish;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\helper\ImageUrls;

$newsletterModel = new Newsletter;

$itemCartCount = 0;
if (!Yii::$app->user->isGuest) {
    $userCart = HelperMethods::createUserCartIfNotExists();
    $itemCartCount = count($userCart->cartItems);
    $itemWishListCount = UserItemWish::find()->where(['user_id' => Yii::$app->user->id])->count();
}


AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="<?=ImageUrls::FAVICON?>" type="image/x-icon"/>

</head>
<body>
<?php $this->beginBody() ?>


<!--Newsletter Popup-->
<div id="newsletter-popup">
    <a class="newsletter-close"><i class="ti-close"></i></a>
    <div id="newsletter-window">
        <div class="newsletter-content-img">
            <img src="img/newletter_popup01.jpg" alt="halimesultan"/>
        </div>
        <div class="newsletter-content">
            <div>
                <h3 class="newsletter-popup-title"><?=Yii::t(Constants::APP, 'nav.newsletter')?></h3>
                <p class="newsletter-popup-slogen">
                    <?=Yii::t(Constants::APP, 'nav.newsletter_description')?>
                </p>
                <form>
                    <div class="form-field-wrapper">
                        <input name="newsletteremail" class="input--lg form-full" title="Email"
                               placeholder="<?=Yii::t(Constants::APP, 'nav.newsletter_email_address')?>" value=""
                               id="newsletteremail" type="email"/>
                    </div>
                    <div class="form-field-wrapper">
                        <input class="btn btn--lg btn--primary form-full" type="submit"
                               value="<?=Yii::t(Constants::APP, 'nav.newsletter_singup')?>"/>
                    </div>
                </form>
                <p class="newsletter-popup-info">
                    <?=Yii::t(Constants::APP, 'nav.newsletter_info')?>
                </p>
                <div class="newsletter-popup-footer">
                    <a href="javascript:void(0)" class="newsletter-close-text">
                        <?=Yii::t(Constants::APP, 'nav.no_thanks')?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Newsletter Popup-->

<!-- Cart Sidebar Menu -->
<?=$this->render(
    'cart.php'
)?>
<!-- End Cart Sidebar Menu -->


<!-- Shop Overlay -->
<div class="shop-overlay"></div>
<!-- End Shop Overlay -->


<!-- Site Wraper -->
<div class="site-wraper">

    <?=$this->render(
        'offer.php'
    )?>
    <!-- Header ('header--dark' or 'header--light', 'header--sticky')-->
    <header id="header" class="header header--sticky" data-header-hover="true">
        <!--Header Navigation-->
        <nav id="navigation" class="header-nav">
            <div class="container-fluid">
                <div class="row">
                    <!--Logo-->
                    <div class="site-logo">
                        <a href="/home">
                            <img src="img/main-logo-dark.png" class="logo-dark" alt="Halimesultan"/>
                            <img src="img/main-logo-light.png" class="logo-light" alt="Halimesultan"/>
                        </a>
                    </div>
                    <!--End Logo-->

                    <!--Navigation Menu Teem-->
                    <div class="nav-menu">
                        <?php
                        $menuItems = HelperMethods::createNavTabs();
                        $menuItems = HelperMethods::createNavSaleTab($menuItems);
                        echo Nav::widget([
                            'options' => ['class' => ''],
                            'items' => $menuItems,
                        ]);
                        ?>
                    </div>


                    <!--Nav Icons-->
                    <div class="nav-icons">
                        <ul>
                            <li class="nav-icon-item">
                                <div class="nav-icon-trigger search-menu-btn"
                                     title="<?=Yii::t(Constants::APP, 'nav.search')
                                     ?>"><span><i class="pe-7s-search"></i></span></div>
                            </li>
                            <span class="hidden header-frontend-cstf"
                                  data-csrf="<?=Yii::$app->request->csrfToken?>"></span>
                            <li class="nav-icon-item">

                                <div class="nav-icon-trigger" title="<?=Yii::t(Constants::APP, 'nav.language')?>">
                                    <i class="pe-7s-world" id="menu1" data-toggle="dropdown"> </i>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <?=Html::a('en', null, ['value' => 'en-US', 'class' => 'languages-drop-down'])?>
                                        </li>
                                        <li>
                                            <?=Html::a('ar', null, ['value' => 'ar', 'class' => 'languages-drop-down'])?>
                                        </li>
                                        <li>
                                            <?=Html::a('tu', null, ['value' => 'tu', 'class' => 'languages-drop-down'])?>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <!--Shows only when login-->
                            <?php if (!Yii::$app->user->isGuest) { ?>
                                <li class="nav-icon-item d-none d-lg-table-cell">
                                    <a class="nav-icon-trigger" href="/user-item-wish/index"
                                       title="<?=Yii::t(Constants::APP, 'nav.wishlist')?>">
                                        <span><i class="pe-7s-like"></i><span
                                                    class="nav-icon-count"><?=$itemWishListCount?></span></span></a>
                                </li>
                                <li class="nav-icon-item">
                                    <div class="nav-icon-trigger cart-sidebar-btn"
                                         title=" <?=Yii::t(Constants::APP, 'nav.shopping_cart')?> ">
                                    <span><i class="pe-7s-shopbag"></i>
                                        <span class="nav-icon-count"><?=$itemCartCount?></span>
                                    </span>
                                    </div>
                                </li>
                            <?php } ?>
                            <li class="nav-icon-item">
                                <div class="nav-icon-trigger dropdown--trigger"
                                     title="<?=Yii::t(Constants::APP, 'nav.user_account')?>">
                                    <span><i class="pe-7s-user-female"></i></span></div>
                                <div class="dropdown--menu dropdown--right">
                                    <ul>
                                        <?php if (!Yii::$app->user->isGuest) { ?>
                                            <li><?=HTML::a(Yii::t(Constants::APP, 'nav.view_profile'), ['/user/view'])?></li>
                                            <li><?=HTML::a(Yii::t(Constants::APP, 'nav.edit_profile'), ['/user/update'])?></li>
                                            <li><?=HTML::a(Yii::t(Constants::APP, 'nav.update_phone'), ['/user/change-phone-number'])?></li>
                                            <li><?=HTML::a(Yii::t(Constants::APP, 'nav.change_password'), ['/user/change-password'])?></li>
                                            <li><?=HTML::a(Yii::t(Constants::APP, 'nav.order_history'), ['/user-order/index'])?></li>
                                            <li><?=HTML::a(Yii::t(Constants::APP, 'nav.contact'), ['/site/contact'])?></li>
                                            <li><?=HTML::a(Yii::t(Constants::APP, 'nav.logout'), ['#'], ['class' => 'logout'])?></li>
                                        <?php } else { ?>
                                            <li><?=HTML::a(Yii::t(Constants::APP, 'nav.login'), ['/site/login'])?></li>
                                            <li><?=HTML::a(Yii::t(Constants::APP, 'nav.sign_up'), ['/site/signup'])?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </li>


                            <!--Shows only when login-->
                        </ul>
                    </div>
                    <!--End Nav Icons-->

                    <!--Search Bar-->
                    <?=$this->render(
                        'search.php'
                    )?>
                    <!--End Search Bar-->
                </div>
            </div>
        </nav>
        <!--End Header Navigation-->
    </header>
    <!-- End Header -->

    <!--Page Body Content -->
    <div class="page-contaiter">

        <?=Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])?>
        <?=Alert::widget()?>
        <?=$content?>


        <footer class="footer bg--dark">
            <!--Footer Widget Bar-->
            <section class="footer-widget-area">
                <div class="container">
                    <div class="row">
                        <div class="footer-widget col-lg-3 col-12 mb-lg-0 mb-4 pr-lg-4">
                            <img class="footer-logo mb-4" src="img/main-logo-light.png" alt="Halime_Sultan"
                                 title="Halime Sultan">
                            <p><?=Yii::t(Constants::APP, 'footer.description')?></p>
                            <ul>
                                <li><i class="fa fa-phone"></i><span><a
                                                href="tel:<?=Yii::$app->params['phone_number']?>"> <?=Yii::$app->params['phone_number']?> </a> </span>
                                </li>
                                <li><i class="fa fa-envelope-open"></i>
                                    <span> <a href="mailto:<?=Yii::$app->params['infoEmail']?>"> <?=Yii::$app->params['infoEmail']?> </a></span>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-widget col-sm-4 col-md-4 col-lg-2 col-12 mb-lg-0 mb-4">
                            <h6 class="footer-widget-title"><?=Yii::t(Constants::APP, 'footer.useful_links')?></h6>
                            <ul>
                                <li><?=HTML::a(Yii::t(Constants::APP, 'footer.about_us'), ['/site/about'])?></li>
                                <li><?=HTML::a(Yii::t(Constants::APP, 'footer.contact_Us'), ['/site/contact'])?></li>
                            </ul>
                        </div>
                        <div class="footer-widget col-sm-4 col-md-4 col-lg-2 col-12 mb-lg-0 mb-4">
                            <h6 class="footer-widget-title"><?=Yii::t(Constants::APP, 'footer.help_support')?></h6>
                            <ul>
                                <li><?=HTML::a(Yii::t(Constants::APP, 'footer.policy-terms'), ['/site/policy-terms'])?></li>
                                <li><?=HTML::a(Yii::t(Constants::APP, 'footer.how_to_use'), ['/site/how-to-use'])?></li>
                            </ul>
                        </div>

                        <div class="footer-widget col-lg-3 col-12 mb-lg-0 mb-3">
                            <h6 class="footer-widget-title"><?=Yii::t(Constants::APP, 'footer.signup_for_newsletter')?></h6>
                            <?php $form = ActiveForm::begin(['options' =>
                                [
                                    'id' => 'register-newsletter',
                                    'enableAjaxValidation' => true,
                                    'class' => 'pt-2',
                                ],
                                'action' => '/site/register-newsletter',
                            ]); ?>
                            <p><?=Yii::t(Constants::APP, 'footer.signup_for_newsletter_description')?></p>
                            <div class="form-field-wrapper">

                                <?=$form->field($newsletterModel, 'email')->textInput([
                                    'type' => 'email',
                                    'placeholder' => Yii::t(Constants::APP, 'footer.signup_for_newsletter_place_holder'),
                                    'class' => 'newsletter-input form-full'
                                ])?>
                                <button class="newsletter-btn btn btn--primary"
                                        type="submit"><?=Yii::t(Constants::APP, 'footer.signup_for_newsletter_button')?></button>
                            </div>
                            <?php ActiveForm::end(); ?>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/halimesultanboutique/" target="_blank"
                                       title="Facebook"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/halimes.co" target="_blank" title="Instagram"><i
                                                class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.pinterest.com/halimesultantr2020/" target="_blank"
                                       title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!--Footer Copyright Bar-->
            <section class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-left">
                            <p class="footer-copyright">
                                &copy; Copyright <?=date('Y')?>
                                <strong><span> <?=Html::encode(Yii::$app->name)?></span></strong>.
                                All Rights Reserved</p>
                        </div>
                        <div class="col-md-6 text-center text-md-right">
                            <img src="img/payment_logos.png" alt="payment logos" title="Payment Logos"/>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
    </div>


</div>

<?php
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
