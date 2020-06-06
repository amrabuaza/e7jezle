<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>
<div class="site-signup">

    <div class="panel panel-default panel_login">
        <div class="panel-body body_login">
    <div class="row">
        <div class="col-lg-12">
            <div class="brand wow fadeIn">
                <h1 class="brand_name">
                    <a href="/E7jezle/advanced/frontend/web/home">E7jezle</a>
                    <hr/>
                </h1>
            </div>
            <h2 class="sinup_mes">SignUp</h2>
            <br/>
            <br/>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-default signup-bt', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>



        </div>
    </div>
</div>
