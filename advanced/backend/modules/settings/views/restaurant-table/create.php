<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\RestaurantTable */

$this->title = 'Create Restaurant Table';
$this->params['breadcrumbs'][] = ['label' => 'Restaurant Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
