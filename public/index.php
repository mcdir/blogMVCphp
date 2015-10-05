<?php

use Core\App;

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} else {
    echo "<h1>Please install via composer.json or make install</h1>";
    echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
    exit(1);
}

if (!file_exists(__DIR__ . '/../app/config/config.ini')) {
    die('No app/config/config.ini found, configure and rename config.example.ini to config.ini in app/config/.');
}

new App();