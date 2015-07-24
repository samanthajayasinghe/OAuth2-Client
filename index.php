<?php
require_once 'vendor/autoload.php';

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

function getClient(){
    $clientId = '<CLIENT-ID>';
    $clientSecret = '<CLIENT-SECRET>';
    $redirectUrl = '<HOST>/oauth2callback';

    $client = new Google_Client();
    $client->setClientId($clientId);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUrl);
    $client->setScopes(['openid','email', 'profile']);
    $client->setIncludeGrantedScopes(true);

    return $client;
}
$app->get('/', function() use($app) {
    $client = getClient();
    return $app->redirect($client->createAuthUrl());
});

$app->get('/oauth2callback', function(Request $request) use($app) {
    $code = $request->get('code');
    $client = getClient();
    $client->authenticate($code);
    $userInfoService = new Google_Service_Oauth2($client);
    $userInfo = $userInfoService->userinfo->get();
    return new Response();
});


$app->run();
