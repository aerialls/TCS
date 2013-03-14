<?php

use Symfony\Component\HttpFoundation\Response;

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
})
->bind('homepage')
;

$app->get('/map', function() use ($app) {
    return $app['twig']->render('map.html.twig');
})
->bind('map')
;

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html.twig' : '500.html.twig';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
