<?php

// Créer immédiatement les répertoires requises par Laravel
$basePath = dirname(__DIR__);
$requiredDirs = [
    $basePath . '/bootstrap/cache',
    $basePath . '/storage',
    $basePath . '/storage/app',
    $basePath . '/storage/framework',
    $basePath . '/storage/logs',
];

foreach ($requiredDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
    @chmod($dir, 0777);
}

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
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
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
if (env('APP_ENV') === 'production' || getenv('VERCEL')) {
    // Utiliser /tmp pour le stockage et le cache en production/Vercel
    $storagePath = '/tmp/storage';
    $cachePath = '/tmp/storage/bootstrap/cache';
    
    // Créer les répertoires s'ils n'existent pas
    @mkdir($storagePath, 0777, true);
    @mkdir($cachePath, 0777, true);
    
    $app->useStoragePath($storagePath);
    $app->useCachePath($cachePath);
}

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;