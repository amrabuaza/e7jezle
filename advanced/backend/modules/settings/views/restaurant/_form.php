<?php

use msvdev\widgets\mappicker\MapInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\Restaurant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'smoke' => 'Smoke', 'no somke' => 'No somke', ], ['prompt' => '']) ?>

    <?=$form->field($model, 'address')
        ->widget(\msvdev\widgets\mappicker\MapInput::className(), ['apiKey' => 'AIzaSyBGlspr8VHElHQCjnx7ZjBb7-KQ1fFjN0k']); ?>

    <?= $form->field($model, 'workTime')->textInput() ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'number_tables')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'avtice' => 'Avtice', 'inavtice' => 'Inavtice', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_owners')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
