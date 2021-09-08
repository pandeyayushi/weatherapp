<?php

namespace api\controllers;

use Yii;
use yii\base\Module;
use yii\web\Controller;
/**
 * WeatherController.
 */
class WeatherController extends Controller
{
    protected $appId;
    protected $appUrl;

    function __construct($id, Module $module, array $config = [])
    {
        $this->appId = Yii::$app->params['weatherAppId'];
        $this->appUrl = Yii::$app->params['weatherApiUrl'];
        parent::__construct($id, $module, $config);
    }

    public function actionGetDetail()
    {
        print_r('hello');exit();
    }

}
