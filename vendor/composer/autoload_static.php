<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita750a50c544f6bd79afa2c36da7f2942
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hybrid\\Breadcrumbs\\' => 19,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
            'Carbon_Fields_Plugin\\' => 21,
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hybrid\\Breadcrumbs\\' => 
        array (
            0 => __DIR__ . '/..' . '/justintadlock/hybrid-breadcrumbs/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Carbon_Fields_Plugin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/wp-content/plugins/carbon-fields-plugin/core',
        ),
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita750a50c544f6bd79afa2c36da7f2942::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita750a50c544f6bd79afa2c36da7f2942::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
