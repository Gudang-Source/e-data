<?php

namespace app\modules\administrator\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `administrator` module
 */
class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //return $this->render('index');
        if(\Yii::$app->user->isGuest){
            return $this->redirect(\Yii::$app->homeUrl.'login');
        }
        else{
            return $this->redirect('dashboard');
        }

    }
}
