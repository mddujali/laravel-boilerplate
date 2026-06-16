<?php

declare(strict_types=1);

/**
 * PHP-specific helpers.
 */

if (!function_exists('ini_sets')) {
    function ini_sets(array $params): array
    {
        $config = [];

        foreach ($params as $key => $value) {
            $config[$key] = ini_set($key, $value);
        }

        return $config;
    }
}

if (!function_exists('ini_restores')) {
    function ini_restores(array $params): void
    {
        foreach ($params as $param) {
            ini_restore($param);
        }
    }
}

if (!function_exists('ini_using_do')) {
    function ini_using_do(array $settings, callable $do)
    {
        $previousSettings = [];

        foreach ($settings as $name => $value) {
            $previousSettings[$name] = ini_set($name, $value);
        }

        $fn = $do();

        if (!empty($previousSettings)) {
            foreach ($previousSettings as $name => $value) {
                ini_set($name, $value);
            }
        }

        return $fn;
    }
}

if (!function_exists('dummy_phpinfo')) {
    function dummy_phpinfo(): void
    {
        echo "PHP Version: " . phpversion() . PHP_EOL;
        echo "OS: " . PHP_OS . PHP_EOL;
        echo "SAPI: " . php_sapi_name() . PHP_EOL;
    }
}
