<?php

// 1. Forcer les configurations Serverless critiques
$serverlessCachePath = '/tmp/storage/bootstrap/cache';
putenv("APP_BOOTSTRAP_CACHE_PATH={$serverlessCachePath}");
$_ENV['APP_BOOTSTRAP_CACHE_PATH'] = $serverlessCachePath;

$_ENV['APP_STORAGE_PATH'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_ENV['LOG_CHANNEL'] = 'stderr';

// 2. Assurer la présence des dossiers temporaires
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

// 3. Bloc de capture de l'erreur masquée
try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    // Si l'application plante, on affiche le vrai coupable directement sur l'écran
    header('Content-Type: text/plain; charset=utf-8');
    echo "=== VRAIE ERREUR INTERCEPTÉE ===\n";
    echo "Message : " . $e->getMessage() . "\n";
    echo "Fichier : " . $e->getFile() . "\n";
    echo "Ligne   : " . $e->getLine() . "\n";
    echo "=================================\n\n";
    echo $e->getTraceAsString();
    exit(1);
}