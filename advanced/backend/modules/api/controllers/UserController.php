<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\User;
use common\models\LoginForm;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\Response;


class UserController  extends ActiveController
{
    public $modelClass='backend\modules\api\models\User';

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



    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return ['access_token' => Yii::$app->user->identity->getAuthKey()];
        } else {
            $model->validate();
            return $model;
        }
    }


}
