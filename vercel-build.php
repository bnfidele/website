<?php
/**
 * Script de préparation Vercel
 * Crée les répertoires nécessaires avec les permissions correctes
 */

$directories = [
    '/tmp/storage',
    '/tmp/storage/bootstrap/cache',
    '/tmp/storage/framework',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
];

echo "Creating directories for Vercel...\n";
foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        if (mkdir($dir, 0777, true)) {
            echo "✓ Created: $dir\n";
        } else {
            echo "✗ Failed to create: $dir\n";
        }
    } else {
        echo "✓ Already exists: $dir\n";
    }
    @chmod($dir, 0777);
}

echo "\nDirectory setup complete!\n";
?>
