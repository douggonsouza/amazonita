<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb5bf8f08b22a3bf9aa08c3ba73f0663b
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitb5bf8f08b22a3bf9aa08c3ba73f0663b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb5bf8f08b22a3bf9aa08c3ba73f0663b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb5bf8f08b22a3bf9aa08c3ba73f0663b::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
