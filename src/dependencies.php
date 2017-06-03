<?php
// DIC configuration

$container = $app->getContainer();

// Eloquent
$capsule = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();

$capsule->bootEloquent();

$container['db'] = function($container) use ($capsule) {
    return $capsule;
};

// $container['cookie'] = function($container) {
//     $request = $container->get('request');
//     return new \Slim\Http\Cookies($request->getCookieParams());
// };


//JWT
$container["jwt"] = function ($container) {
    return new StdClass;
};

//Validator
$container['validator'] = function($container) {
    return new \App\Validation\Validator;
};

//Authentication
$container['auth'] = function($container) {
    return new \App\Authentication\Auth;
};
// routing setting example
// $container['HomeController'] = function($container){
//     return new \App\Controllers\HomeController($container);
// };
