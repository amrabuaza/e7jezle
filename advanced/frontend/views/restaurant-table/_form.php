<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\RestaurantTable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-table-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'capacity')->textInput() ?>

    <?= $form->field($model, 'state')->dropDownList([ 'avilable' => 'Avilable', 'busy' => 'Busy', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'reservation_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_of_table')->textInput() ?>

    <?=
    $form->field($model, 'id_restaurant')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\frontend\models\Restaurant::find()->where(['id_owners'=>Yii::$app->user->id])->all(),'id','name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Restaurant ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label("Restaurant Name");

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
