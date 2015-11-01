<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);


$app->singleton('Github\Client', function () {
  $client = new Github\Client();
  $token = env('GITHUB_TOKEN');

  if (!isset($token)) {
    dd("Github token is not set.");
  }

  $client->authenticate(env('GITHUB_EMAIL'), env('GITHUB_PASSWORD'), Github\Client::AUTH_HTTP_PASSWORD);
  //$client->authenticate($token, null, Github\Client::AUTH_HTTP_TOKEN);

  return $client;
});

return $app;


