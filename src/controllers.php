<?php

use Symfony\Component\HttpFoundation\Response;

// Presentation
$app->get('/', function () use ($app) {
    return $app['twig']->render('presentation.html.twig');
})
->bind('presentation')
;

// Maps
$app->get('/maps', function() use ($app) {
    return $app['twig']->render('maps.html.twig');
})
->bind('maps')
;

// Prices
$app->get('/prices', function() use ($app) {
    return $app['twig']->render('prices.html.twig');
})
->bind('prices')
;

// Solutions
$app->get('/solutions', function() use ($app) {
    return $app['twig']->render('solutions.html.twig');
})
->bind('solutions')
;

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html.twig' : '500.html.twig';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
