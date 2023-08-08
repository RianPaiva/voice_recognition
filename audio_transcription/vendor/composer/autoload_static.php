<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2fa8d0b1d30a455fa02b66384f07956e
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tenen\\AudioTranscription\\' => 25,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tenen\\AudioTranscription\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2fa8d0b1d30a455fa02b66384f07956e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2fa8d0b1d30a455fa02b66384f07956e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2fa8d0b1d30a455fa02b66384f07956e::$classMap;

        }, null, ClassLoader::class);
    }
}