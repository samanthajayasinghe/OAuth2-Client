<?php

namespace OauthClient\Service;

use Google_Service_Oauth2;
use OauthClient\Config;
use OauthClient\OauthClient;
use OauthClient\ClientFactory;

class ClientService {


    /**
     * @var Config
     */
    private $config = null;


    public function __construct(Config $config){
        $this->setConfig($config);
    }

    /**
     * @return OauthClient
     */
    private function createClient()
    {
        $clientFactory = new ClientFactory();
        return $clientFactory->getClient($this->getConfig()->getProvider());
    }

    /**
     * @return OauthClient
     */
    protected  function getClient(){
        $client = $this->createClient();
        $config = $this->getConfig();
        $client->setClientId($config->getClientId());
        $client->setClientSecret($config->getClientSecret());
        $client->setRedirectUri($config->getAppAuthUrl());
        $client->setScopes(['openid','email', 'profile']);
        $client->setIncludeGrantedScopes(true);
        return $client;
    }

    /**
     * @return string
     */
    public function getAuthUrl(){
        return $this->getClient()->createAuthUrl();
    }

    /**
     * @param $code
     * @return bool
     */
    public function authenticate( $code ){
        return $this->getClient()->authenticate($code);
    }

    /**
     * @return mixed
     */
    public function getUserInfo(){
        $userInfoService = new Google_Service_Oauth2($this->getClient());
        return $userInfoService->userinfo->get();

    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Config $config
     * @return $this;
     */
    private function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

} 
