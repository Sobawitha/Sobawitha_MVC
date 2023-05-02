<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite2c0eddc15bac1d772abf2c1fb57988d
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );
        }
class ComposerStaticInit7e196f9056ba7d76a31dc558d5cb93c0
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );


public static $prefixDirsPsr4 = array (
    'PHPMailer\\PHPMailer\\' => 
    array (
        0 => '/path/to/phpmailer/src',
    ),
    'Stripe\\' => 
    array (
        0 => '/path/to/stripe-php/lib',
    ),
);


    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite2c0eddc15bac1d772abf2c1fb57988d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite2c0eddc15bac1d772abf2c1fb57988d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite2c0eddc15bac1d772abf2c1fb57988d::$classMap;

        }, null, ClassLoader::class);
    }
}
