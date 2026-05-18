<?php

// 1. Forcer Laravel à utiliser le dossier temporaire /tmp pour son amorçage
$serverlessCachePath = '/tmp/storage/bootstrap/cache';
putenv("APP_BOOTSTRAP_CACHE_PATH={$serverlessCachePath}");
$_ENV['APP_BOOTSTRAP_CACHE_PATH'] = $serverlessCachePath;

// 2. Rediriger les autres dossiers de stockage et forcer les logs sur stderr
$_ENV['APP_STORAGE_PATH'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_ENV['LOG_CHANNEL'] = 'stderr';

// 3. Créer l'arborescence dans la zone inscriptible /tmp
$storageFolders = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/bootstrap/cache',
];

foreach ($storageFolders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }
}

// 4. Lancement officiel de l'application
require __DIR__ . '/../public/index.php';