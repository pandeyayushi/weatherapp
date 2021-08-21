<?php

namespace api\controllers;

use common\services\ApiService;
use Yii;
use yii\base\Module;
use yii\helpers\BaseJson;
use yii\web\Controller;
/**
 * WeatherController.
 */
class WeatherController extends Controller
{
    protected $baseUrl;
    protected $service;

    function __construct($id, Module $module, array $config = [], ApiService $service)
    {
        $this->baseUrl = Yii::$app->params['weatherApiUrl'];

        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    public function actionGetDetail($q)
    {   
        return $this->getResponse($q);
    }


    protected function getResponse($query)
    {
        $url = $this->baseUrl . "/data/2.5/weather";
        $params = [
            'q' => $query
        ];
        $response = $this->service->send($url, $params, 'GET');
        return $this->prepareResponse($response);
    }

    protected function prepareResponse($response)
    {
        $content = BaseJson::decode($response->content, $asArray = true);
        Yii::$app->response->statusCode = $content['cod'];
        return $content;
    }

}
