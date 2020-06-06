<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\RestaurantTableSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-table-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'capacity') ?>

    <?= $form->field($model, 'state') ?>

    <?= $form->field($model, 'reservation_code') ?>

    <?= $form->field($model, 'number_of_table') ?>

    <?php // echo $form->field($model, 'id_restaurant') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
