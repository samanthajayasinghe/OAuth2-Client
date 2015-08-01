<?php
namespace OauthClient;


interface OauthClient {
    /**
     * @param string $clientId
     */
    public function setClientId($clientId);

    /**
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret);

    /**
     * @param string $redirectUri
     */
    public function setRedirectUri($redirectUri);

    /**
     * @param string $code
     * @return bool
     */
    public function authenticate($code);

    /**
     * @param $json
     * @return $this
     */
    public function setAuthConfig($json);

    /**
     * @return mixed
     */
    public function createAuthUrl();

    /**
     * @param $hostedDomain
     * @return $this
     */
    public function setHostedDomain($hostedDomain);

    /**
     * @param string $token
     * @return bool
     */
    public function verifyIdToken($token = null);

    /**
     * @param string $scopes
     * @return mixed
     */
    public function setScopes($scopes);
} 
