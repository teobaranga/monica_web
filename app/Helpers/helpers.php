<?php

use App\Helpers\LocaleHelper;

if (!function_exists('htmldir')) {
    /**
     * Get the direction: left to right/right to left.
     *
     * @return string
     *
     * @see LocaleHelper::getDirection()
     */
    function htmldir()
    {
        return LocaleHelper::getDirection();
    }
}

if (!function_exists('array_map_assoc')) {
    /**
     * Apply a mapping callback receiving key and value as arguments.
     * The standard array_map doesn't pass the key to the callback. But in the case of associative arrays,
     * it could be really helpful.
     *
     * array_map_assoc(function ($key, $value) {
     *  ...
     * }, $items)
     *
     * @param callable $callback
     * @param array $array
     * @return array
     */
    function array_map_assoc(callable $callback, array $array): array
    {
        return array_map(function ($key) use ($callback, $array) {
            return $callback($key, $array[$key]);
        }, array_keys($array));
    }
}
