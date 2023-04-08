<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7e196f9056ba7d76a31dc558d5cb93c0
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7e196f9056ba7d76a31dc558d5cb93c0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7e196f9056ba7d76a31dc558d5cb93c0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7e196f9056ba7d76a31dc558d5cb93c0::$classMap;

        }, null, ClassLoader::class);
    }
}
