<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita18062bdc917d9aecfd7bd2dd0d10efd
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita18062bdc917d9aecfd7bd2dd0d10efd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita18062bdc917d9aecfd7bd2dd0d10efd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}