<?php

use backend\modules\settings\models\Menu;
use backend\modules\settings\models\Restaurant;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\Item */
/* @var $form yii\widgets\ActiveForm */
$restaurnat_id = Restaurant::find()->where(['id_owners'=>Yii::$app->user->id])->addSelect('id');
$query = Menu::find()->where(['id_restaurant'=>$restaurnat_id]);
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
            $form->field($model, 'id_mnue')->widget(Select2::classname(), [
            'data' =>ArrayHelper::map(Menu::find()->where(['id_restaurant'=>$restaurnat_id])->all(),'id','name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Select a Menu ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label("Menu Name");?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php if(!$model->isNewRecord){ ?>
        <div class="btn btn-info btn-sm password-click">Edit Picture !!</div>
        <div class="pass-in">
            <?= $form->field($model, 'picture')->fileInput() ?>
        </div>
        <br/>
        <br/>
    <?php } else {
        echo  $form->field($model, 'picture')->fileInput();
    } ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
