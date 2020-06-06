<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\User;
use common\models\LoginForm;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class OrderItemController extends ActiveController
{
    public $modelClass='backend\modules\settings\models\OrderItem';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = array(
            'class' => HttpBasicAuth::className(),
            'auth' => function ($username, $password) {
                $user = User::findByUsername($username);
                if($user->validatePassword($password))
                {
                    return $user->type == "admin" ? $user : null;
                }
                else return null;
            }
        );
        return $behaviors;
    }

}
