<?php
ini_set('display_errors',true);
require_once 'vendor/autoload.php';

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use OauthClient\Service\ClientService;
use OauthClient\Config;

$app = new Silex\Application();
$app['debug'] = true;

$clientId = '53712880555-5llqustj9g6trps9h49pila1191sa9p7.apps.googleusercontent.com';
$clientSecret = 'ih75vHw-4_TUSxaISvYqLUsw';
$redirectUrl = 'http://git-oauth.dev/index.php/oauth2callback';

$service = new ClientService(
                new Config('google', $clientId, $clientSecret, $redirectUrl)
            );

$app->get('/', function() use($app, $service) {

    return $app->redirect($service->getAuthUrl());
    return new Response();
});

$app->get('/oauth2callback', function(Request $request) use($app, $service) {
    $code = $request->get('code');
    //if($service->authenticate($code)){
       // $service->getUserInfo();
        //Do anything after that
    //}
    return new Response();
});


$app->run();
