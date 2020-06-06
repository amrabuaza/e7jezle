<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?php if(!$model->isNewRecord){ ?>
    <div class="btn btn-info btn-sm password-click">Edit Password !!</div>
    <div class="pass-in">
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    </div>
    <br/>
    <?php } else {
    echo  $form->field($model, 'password')->passwordInput(['maxlength' => true]);
    } ?>
    <?= $form->field($model, 'type')->dropDownList([ 'admin' => 'Admin', 'user' => 'User', 'customer' => 'Customer', ], ['prompt' => '']) ?>


    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>


    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
