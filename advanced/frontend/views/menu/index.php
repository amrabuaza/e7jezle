<?php

use frontend\models\ItemSearch;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = "Restaurants";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'columns' => [
                [
            'class' => 'kartik\grid\ExpandRowColumn',
            'value'=> function($model,$key,$index,$column)
            {
                return GridView::ROW_COLLAPSED;
            },
            'detail'=> function($model,$key,$index,$column)
            {
                $searchModel = new ItemSearch();
                $searchModel->id_mnue = $model->id;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return Yii::$app->controller->renderPartial('_item',[
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            },
                    ],
            'id',
            'name',
            'id_restaurant',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
