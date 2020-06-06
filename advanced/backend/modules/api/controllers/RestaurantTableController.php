<?php

use backend\modules\api\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class RestaurantTableController extends ActiveController
{
    public $modelClass='backend\modules\settings\models\RestaurantTable';

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
