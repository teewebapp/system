<?php

define('LARAVEL_START', microtime(true));


require 'vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Setup Patchwork UTF-8 Handling
|--------------------------------------------------------------------------
|
| The Patchwork library provides solid handling of UTF-8 strings as well
| as provides replacements for all mb_* and iconv type functions that
| are not available by default in PHP. We'll setup this stuff here.
|
*/

Patchwork\Utf8\Bootup::initMbstring();

/*
|--------------------------------------------------------------------------
| Register The Laravel Auto Loader
|--------------------------------------------------------------------------
|
| We register an auto-loader "behind" the Composer loader that can load
| model classes on the fly, even if the autoload files have not been
| regenerated for the application. We'll add it to the stack here.
|
*/

$moduleName = basename(getcwd());
if(!file_exists('vendor/teewebapp'))
    mkdir('vendor/teewebapp');
if(!file_exists("vendor/teewebapp/$moduleName"))
    symlink(getcwd(), "vendor/teewebapp/$moduleName");

Illuminate\Support\ClassLoader::register();
