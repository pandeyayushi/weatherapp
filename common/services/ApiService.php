<?php

namespace common\services;

use yii\httpclient\Client;
use common\services\interfaces\IApiService;
use Yii;
use yii\helpers\ArrayHelper;

class ApiService implements IApiService
{
    function __construct()
    {
        $this->client = new Client();
        $this->baseParams = [
            "appid" => Yii::$app->params['weatherAppId'],
        ];
    }

    public function send($url, $data, $method)
    {   
        $params = $this->prepare($data);
        return $this->client->createRequest()
        ->setMethod($method)
        ->setUrl($url)
        ->setData($params)
        ->send();
    }

    public function prepare($params)
    {
        return ArrayHelper::merge($this->baseParams, $params);
    }
}