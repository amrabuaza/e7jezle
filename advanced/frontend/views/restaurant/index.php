<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RestaurantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Restaurants';
?>
<div class="restaurant-index">

    <h1><?= Html::encode("My Restaurants") ?></h1>
    </br>
    </br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="row">
    <?php
        foreach ($dataProvider as $obj)
            { ?>
        <div class="col-lg-6">
            <?php if($obj->status=="avtice"){ ?>
            <div class="panel panel-success">
                <?php } else { ?>
                <div class="panel panel-danger">
                    <?php } ?>
                <div class="panel-heading">
                    <div class="restaurant-panel">
                        <h2><?= $obj->name ?></h2>
                    <a href="/E7jezle/advanced/frontend/web/restaurant/view?id=<?=$obj->id ?>"
                       title="View" aria-label="View" data-pjax="0">
                        <span class="glyphicon glyphicon-eye-open action"></span>
                    </a>

                    <a href="/E7jezle/advanced/frontend/web/restaurant/<?=$obj->id ?>" title="Update" aria-label="Update" data-pjax="0">
                        <span class="glyphicon glyphicon-pencil action"></span>
                    </a>

                    <a href="/E7jezle/advanced/frontend/web/restaurant/delete?id=<?=$obj->id ?>" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post">
                        <span class="glyphicon glyphicon-trash action"></span>
                    </a>
                    </div>

                </div>

                <div class="panel-body">
                    <a href="restaurant-table/index?id=<?=$obj->id ?>">Tables</a></br></br>
                    <a href="menu/index?id=<?=$obj->id ?>">Menus</a></br>
                </div>
            </div>
        </div>



            <?php } ?>

    </div>


</div>
</div>
