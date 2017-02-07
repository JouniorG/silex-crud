<?php
require_once __DIR__."/../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();
$app["debug"] = true;


$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/../views'
));


$app->get("/", function () use ($app) {
    return $app["twig"]->render("index.html.twig");
});

$app->get('/register', function(Request $request) use ($app){
	return $app['twig']->render('register.html.twig');
});

$app->run();