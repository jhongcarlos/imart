<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2aeb8e24ab4dcfabf3da1a9d58759a09
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2aeb8e24ab4dcfabf3da1a9d58759a09::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2aeb8e24ab4dcfabf3da1a9d58759a09::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
