<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'id_restaurant')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\frontend\models\Restaurant::find()->all(),'id','name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Restaurant ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label("Restaurant Name");

    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
