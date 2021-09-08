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
    protected $baseUrl;
    protected $baseParams;

    function __construct($id, Module $module, array $config = [])
    {
        $this->baseUrl = Yii::$app->params['weatherApiUrl'];
        $this->baseParams = [
            "appid" => Yii::$app->params['weatherAppId'],
        ];
        parent::__construct($id, $module, $config);
    }

    public function actionGetDetail()
    {
        print_r('hello');exit();
    }

}
