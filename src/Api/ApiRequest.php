<?php

namespace vtnil\JuShuiTan\Api;

use vtnil\JuShuiTan\Api\Common\BaseApi;
use vtnil\JuShuiTan\Api\Common\Client;
use vtnil\JuShuiTan\Api\Common\ServeHttp;
use vtnil\JuShuiTan\Api\Common\Util;

class ApiRequest extends BaseApi implements ServeHttp
{
    public function request($serveHttp, $params): array
    {
        return Client::post($serveHttp, Util::getParams($this->getConfig()['app_Secret'], $params));
    }

}