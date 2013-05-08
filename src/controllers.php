<?php

use Symfony\Component\HttpFoundation\Response;

// Société
$app->get('/', function () use ($app) {
    return $app['twig']->render('societe.html.twig');
})
->bind('societe')
;

// Carte
$app->get('/architecture/carte', function() use ($app) {
    return $app['twig']->render('archi-carte.html.twig');
})
->bind('archi_carte')
;

// Salle
$app->get('/architecture/salle', function() use ($app) {
    return $app['twig']->render('archi-salle.html.twig');
})
->bind('archi_salle')
;

// Contact
$app->get('/contact', function() use ($app) {
    return $app['twig']->render('contact.html.twig');
})
->bind('contact')
;

// Send mail
$app->post('/send', function() use ($app) {
    $request = $app['request'];
    $template = <<<EOF
Nouveau message de {{ nom }}.
Cette personne a choisis la solution {{ solution }}.

{{ message }}
--
Message automatique.
EOF;

    $body = strtr($template,array(
        '{{ nom }}' => $request->get('name'),
        '{{ solution }}' => $request->get('solution'),
        '{{ message }}' => $request->get('message'),
    ));

    $message = \Swift_Message::newInstance()
        ->setSubject('[TCS] Message')
        ->setFrom(array($request->get('email')))
        ->setTo(array('mewt.fr@gmail.com'))
        ->setBody($body);

    $app['mailer']->send($message);

    return $app['twig']->render('send.html.twig');
})
->bind('send_mail')
;

// Prix installations physique
$app->get('/architecture/prix', function() use ($app) {
    return $app['twig']->render('archi-prix.html.twig');
})
->bind('archi_prix')
;

// Solutions
$app->get('/solutions', function() use ($app) {
    return $app['twig']->render('solutions.html.twig');
})
->bind('solutions')
;

$app->get('/solutions/low-cost', function() use ($app) {
    return $app['twig']->render('solution-lowcost.html.twig');
})
->bind('solution_low')
;

$app->get('/solutions/qualite-prix', function() use ($app) {
    return $app['twig']->render('solution-middle.html.twig');
})
->bind('solution_middle')
;

$app->get('/solutions/premium', function() use ($app) {
    return $app['twig']->render('solution-premium.html.twig');
})
->bind('solution_premium')
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
