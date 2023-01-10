<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit21d7ecefbea000405b7ca34af59198c2
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jaja\\StratPattern\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jaja\\StratPattern\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit21d7ecefbea000405b7ca34af59198c2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit21d7ecefbea000405b7ca34af59198c2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit21d7ecefbea000405b7ca34af59198c2::$classMap;

        }, null, ClassLoader::class);
    }
}
