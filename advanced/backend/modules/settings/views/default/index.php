<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
?>

<div class="settings-default-index" xmlns="http://www.w3.org/1999/html">
    <div class="panel panel-default">
        <div class="panel-heading">
            All Tables
        </div>
        <div class="panel-body">
            <a href="settings/user">Users</a></br></br>
            <a href="settings/restaurant">Restaurants</a></br></br>
            <a href="settings/restaurant-table">Restaurant Tables</a></br></br>
            <a href="settings/menu">Menus</a></br></br>
            <a href="settings/item">Items</a></br></br>
            <a href="settings/order-item">order Items</a></br></br>
            <a href="settings/user-order">User orders</a>
        </div>
    </div>
</div>
