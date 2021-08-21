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
        if($content['cod'] == 200) {
            return $this->preapreReponseArray($content);
        }
        return $content;
    }

    protected function preapreReponseArray($content)
    {
        return [
            'cod' => $content['cod'],
            'name' => $content['name'],
            'country' =>  $content['sys']['country'],
            'timezone' =>  $content['timezone'],
            'weather' => $content['weather'][0]['main'],
            'description' => $content['weather'][0]['description'],
            'coordinates' => $content['coord'],
            'wind-speed' => $content['wind']['speed'],
            'wind-deg' => $content['wind']['deg'],
            'temp_min' =>  $content['main']['temp_min'],
            'temp_max' =>  $content['main']['temp_max'],
            'pressure' =>  $content['main']['pressure'],
            'humidity' =>  $content['main']['humidity'],
            'visibility' => $content['visibility'],
            'sunrise' =>  $content['sys']['sunrise'],
            'sunset' =>  $content['sys']['sunset'],
        ];
    }

}
