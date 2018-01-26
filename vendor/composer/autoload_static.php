<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb42050bcc35da783ce83cf3e0f993609
{
    public static $firstCharsPsr4 = array (
        'P' => true,
        'M' => true,
        'K' => true,
        'A' => true,
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'Kenjis\\CodeIgniter_Cli\\_Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/kenjis/codeigniter-cli/config',
        ),
        'Kenjis\\CodeIgniter_Cli\\' => 
        array (
            0 => __DIR__ . '/..' . '/kenjis/codeigniter-cli/src',
        ),
        'Aura\\Project_Kernel\\_Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/project-kernel/config',
        ),
        'Aura\\Project_Kernel\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/project-kernel/src',
        ),
        'Aura\\Dispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/dispatcher/src',
        ),
        'Aura\\Di\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/di/src',
        ),
        'Aura\\Cli_Kernel\\_Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/cli-kernel/config',
        ),
        'Aura\\Cli_Kernel\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/cli-kernel/src',
        ),
        'Aura\\Cli\\_Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/cli/config',
        ),
        'Aura\\Cli\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/cli/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->firstCharsPsr4 = ComposerStaticInitb42050bcc35da783ce83cf3e0f993609::$firstCharsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb42050bcc35da783ce83cf3e0f993609::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}