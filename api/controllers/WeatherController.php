<?php

namespace api\controllers;

use Yii;
/**
 * WeatherController.
 */
class WeatherController
{
    private $appId;
    private $appUrl;

    public function __construct()
    {
        $this->appId = Yii::$app->params['weatherAppId'];
        $this->appUrl = Yii::$app->params['weatherApiUrl'];
    } 

    public function actionGetDetail()
    {
    }

}
