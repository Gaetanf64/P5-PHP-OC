<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc6f20f8961f313b790ce4a2296be79db
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitc6f20f8961f313b790ce4a2296be79db::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc6f20f8961f313b790ce4a2296be79db::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc6f20f8961f313b790ce4a2296be79db::$classMap;

        }, null, ClassLoader::class);
    }
}
