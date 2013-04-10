<?php

use Symfony\Component\HttpFoundation\Response;

// Presentation
$app->get('/', function () use ($app) {
    return $app['twig']->render('presentation.html.twig');
})
->bind('presentation')
;

// Carte
$app->get('/carte', function() use ($app) {
    return $app['twig']->render('carte.html.twig');
})
->bind('carte')
;

// Salle
$app->get('/salle', function() use ($app) {
    return $app['twig']->render('salle.html.twig');
})
->bind('salle')
;

// Prix
$app->get('/prix', function() use ($app) {
    return $app['twig']->render('prix.html.twig');
})
->bind('prix')
;

// Solutions
$app->get('/solutions', function() use ($app) {
    return $app['twig']->render('solutions.html.twig');
})
->bind('solutions')
;

$app->get('/repartiteur/{id}', function($id) use ($app) {
    return $app['twig']->render('repartiteur-'.$id.'.html.twig');
})
->bind('repartiteur')
;

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html.twig' : '500.html.twig';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
