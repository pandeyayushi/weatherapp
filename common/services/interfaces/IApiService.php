<?php


namespace common\services\interfaces;

interface IApiService
{
    public function prepare($request);

    public function send($url, $params, $method);
}