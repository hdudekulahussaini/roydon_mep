<?php

declare(strict_types=1);

use Flasher\Prime\Configuration;

return Configuration::from([
    // Default notification adapter
    'default' => 'flasher',

    // Core flasher script (loads first)
    'main_script' => '/vendor/flasher/flasher.min.js',

    // Additional scripts — Amazon theme loads AFTER core
    'scripts' => [
        '/vendor/flasher/themes/amazon/amazon.min.js',
    ],

    // Stylesheets
    'styles' => [
        '/vendor/flasher/flasher.min.css',
        '/vendor/flasher/themes/amazon/amazon.min.css',
    ],

    // Global notification options
    'options' => [
        'timeout' => 5000,
        'position' => 'top-right',
    ],

    // Auto-inject assets into responses
    'inject_assets' => true,

    // Enable automatic message translation
    'translate' => true,

    // Map Laravel session flash keys to notification types
    'flash_bag' => [
        'success' => ['success'],
        'error'   => ['error', 'danger'],
        'warning' => ['warning', 'alarm'],
        'info'    => ['info', 'notice', 'alert'],
    ],
]);
