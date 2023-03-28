<?php

namespace vtnil\JuShuiTan;

use GuzzleHttp\Client;

class JuShuiTan
{
    /**
     * 全局config配置
     * @var array
     */
    protected $config = [
        'authUrl' => 'https://openweb.jushuitan.com/auth',
        'baseUrl' => '',
        'access_token' => '',
        'app_Key' => '',
        'app_Secret' => '',
        'version' => 2,
        'charset' => 'utf-8'
    ];

    /**
     * Snake
     * 公共请求参数
     * @var array|string[]
     */
    protected $publicRequestParams = [
        'app_key' => '',
        'access_token' => '',
        'timestamp' => '',
        'charset' => '',
        'version' => '',
    ];

    /**
     * Client请求
     * @var Client
     */
    protected $client;

    /**
     * 定义获取access—token Url
     * @var string
     */
    protected $getAccessTokenUrl = 'https://openapi.jushuitan.com/openWeb/auth/accessToken';

    /**
     * 定义refresh-token地址
     * @var string
     */
    protected $refreshTokenUrl = 'https://openapi.jushuitan.com/openWeb/auth/refreshToken';

    /**
     * 获取config配置
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * 设置config配置
     * @param array $config
     * @return JuShuiTan
     */
    public function setConfig(array $config): JuShuiTan
    {
        if (isset($config['app_Key'], $config['app_Secret'], $config['baseUrl'],$config['access_token'])) {
            $this->config['access_token'] = $config['access_token'];
            $this->config['baseUrl'] = $config['baseUrl'];
            $this->config['app_Key'] = $config['app_Key'];
            $this->config['app_Secret'] = $config['app_Secret'];
        }
        return $this;
    }

    /**
     * 获取公共参数
     * @return array
     */
    public function getPublicRequestParams(): array
    {
        return $this->publicRequestParams;
    }

    /**
     * 设置公共参数
     */
    public function setPublicRequestParams(): JuShuiTan
    {
        if (isset($this->getConfig()['app_Key'], $this->getConfig()['access_token'])){
            $this->publicRequestParams = [
               'app_key' => $this->config['app_Key'],
               'access_token' =>  $this->config['access_token'],
               'timestamp' => time(),
               'charset' => $this->config['charset'],
               'version' => $this->config['version'],
           ];
        }
       return $this;
    }
}
