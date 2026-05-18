<?php

// Création automatique des dossiers requis dans la zone temporaire de Vercel
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

// Redirection vers le dossier public de Laravel 10
require __DIR__ . '/../public/index.php';