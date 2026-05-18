<?php

// 1. Création dynamique de l'arborescence dans l'espace temporaire inscriptible
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

// 2. Inclure l'application Laravel classique
require __DIR__ . '/../public/index.php';