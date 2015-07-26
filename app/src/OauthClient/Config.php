<?php

namespace OauthClient;

class Config {

    const OAUTH_PROVIDER_NAME_GOOGLE = 'google';

    const OAUTH_PROVIDER_NAME_FACEBOOK = 'facebook';

    const OAUTH_PROVIDER_NAME_LINKEDIN = 'linkedin';

    /**
     * @var
     */
    private $provider = '';

    /**
     * @var string
     */
    private $clientId = '';

    /**
     * @var string
     */
    private $clientSecret = '';

    /**
     * @var string
     */
    private $appAuthUrl ='';

    /**
     * @param $clientId
     * @param $clientSecret
     * @param $appAuthUrl
     */
    public function __construct( $provider, $clientId, $clientSecret, $appAuthUrl ){
        $this->setProvider($provider)
            ->setClientId($clientId)
            ->setClientSecret($clientSecret)
            ->setAppAuthUrl($appAuthUrl);
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     * @return $this;
     */
    private function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getAppAuthUrl()
    {
        return $this->appAuthUrl;
    }

    /**
     * @param mixed $appAuthUrl
     * @return $this;
     */
    private function setAppAuthUrl($appAuthUrl)
    {
        $this->appAuthUrl = $appAuthUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     * @return $this;
     */
    private function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     * @return $this;
     */
    private function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }
} 
