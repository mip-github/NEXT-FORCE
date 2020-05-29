<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0bb8671d8dfaebdda9f685d58cdff9dc
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0bb8671d8dfaebdda9f685d58cdff9dc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0bb8671d8dfaebdda9f685d58cdff9dc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}