<?php

/*

|--------------------------------------------------------------------------
| Définition d'une Application surchargée pour le Serverless (Vercel)
|--------------------------------------------------------------------------
*/

class VercelServerlessApplication extends Illuminate\Foundation\Application
{
    // Surcharger le chemin du dossier bootstrap
    public function bootstrapPath($path = '')
    {
        $isVercel = env('APP_ENV') === 'production' || getenv('VERCEL');
        $base = $isVercel ? '/tmp/bootstrap' : $this->basePath.DIRECTORY_SEPARATOR.'bootstrap';
        
        return $base.($path ? DIRECTORY_SEPARATOR.$path : '');
    }

    // Surcharger le chemin du dossier storage
    public function storagePath($path = '')
    {
        $isVercel = env('APP_ENV') === 'production' || getenv('VERCEL');
        $base = $isVercel ? '/tmp/storage' : ($this->storagePath ?: $this->basePath.DIRECTORY_SEPARATOR.'storage');
        
        return $base.($path ? DIRECTORY_SEPARATOR.$path : '');
    }
}

/*

|--------------------------------------------------------------------------
| Initialisation de l'Application
|--------------------------------------------------------------------------
*/

if (env('APP_ENV') === 'production' || getenv('VERCEL')) {
    // Initialiser les répertoires temporaires en écriture sur Vercel
    @mkdir('/tmp/bootstrap/cache', 0777, true);
    @mkdir('/tmp/storage/framework/views', 0777, true);
    @mkdir('/tmp/storage/framework/cache', 0777, true);
    @mkdir('/tmp/storage/framework/sessions', 0777, true);
}

// Instanciation de notre classe personnalisée au lieu de la classe par défaut
$app = new VercelServerlessApplication(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*

|--------------------------------------------------------------------------
| Enregistrement des Kernels
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

return $app;
