<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit68fbfb4aedf0feb4fa6865ba54b4dd50
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Miniframework\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Miniframework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit68fbfb4aedf0feb4fa6865ba54b4dd50::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit68fbfb4aedf0feb4fa6865ba54b4dd50::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit68fbfb4aedf0feb4fa6865ba54b4dd50::$classMap;

        }, null, ClassLoader::class);
    }
}
