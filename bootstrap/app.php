<?php

/*

|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
*/

$isVercel = env('APP_ENV') === 'production' || getenv('VERCEL');

if ($isVercel) {
    // Force Laravel à utiliser /tmp pour l'écriture des manifests de packages
    $_ENV['APP_BASE_PATH'] = '/tmp';
    
    // Crée les dossiers requis dans le seul espace accessible en écriture
    @mkdir('/tmp/bootstrap/cache', 0777, true);
    @mkdir('/tmp/storage/framework/views', 0777, true);
}

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*

|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->register(Artesaos\SEOTools\Providers\SEOToolsServiceProvider::class);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*

|--------------------------------------------------------------------------
| Configuration pour l'environnement Serverless (Vercel)
|--------------------------------------------------------------------------
*/
if ($isVercel) {
    // Redirige le stockage classique (logs, sessions) vers /tmp
    $app->useStoragePath('/tmp/storage');

    // Redirige le chemin bootstrap vers /tmp pour contourner le blocage du cache
    $app->bind('path.bootstrap', function () {
        return '/tmp/bootstrap';
    });
}

return $app;
