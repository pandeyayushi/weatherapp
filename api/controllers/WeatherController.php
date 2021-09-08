<?php

namespace api\controllers;

use Yii;
use yii\base\Module;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\httpclient\Client;
/**
 * WeatherController.
 */
class WeatherController extends Controller
{
    protected $baseUrl;
    protected $baseParams;
    protected $client;

    function __construct($id, Module $module, array $config = [])
    {
        $this->baseUrl = Yii::$app->params['weatherApiUrl'];
        $this->baseParams = [
            "appid" => Yii::$app->params['weatherAppId'],
        ];
        $this->client = new Client();
        parent::__construct($id, $module, $config);
    }

    public function actionGetDetail($q)
    {   
        $response = $this->getResponse($q);
        print_r($response);exit();
    }


    protected function getResponse($query)
    {
        $url = $this->baseUrl . "/data/2.5/weather";
        $data = [
            'q' => $query
        ];
        $params = ArrayHelper::merge($this->baseParams, $data);
        $response = $this->client->createRequest()
        ->setMethod('GET')
        ->setUrl($url)
        ->setData($params)
        ->send();
        return $response;
    }

    protected function prepareResponse($response)
    {

    }

}
