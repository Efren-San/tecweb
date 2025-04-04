<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf14b56480752e2f3ceb505cbd59c3a2e
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

        spl_autoload_register(array('ComposerAutoloaderInitf14b56480752e2f3ceb505cbd59c3a2e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf14b56480752e2f3ceb505cbd59c3a2e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf14b56480752e2f3ceb505cbd59c3a2e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
