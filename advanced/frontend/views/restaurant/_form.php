<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Restaurant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-form">
<?php
//    if(isset($cheak))
//       echo $cheak;
//    die;

?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'smoke' => 'Smoke', 'no somke' => 'No somke', ], ['prompt' => '']) ?>

    <?=$form->field($model, 'address')
        ->widget(\msvdev\widgets\mappicker\MapInput::className(),
            [
                'mapCenter' => [$model->latitude,$model->longitude],
                'mapZoom' => 5,
                'apiKey' => 'AIzaSyBaSSGZhnqDf3-jB7zJYXGiS5JCjTNL4U0',
                'mapWidth' => '420px',
            ])->label(false); ?>
    <?= $form->field($model, 'workTime')->textInput() ?>

    <?= $form->field($model, 'number_tables')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
