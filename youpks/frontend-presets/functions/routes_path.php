<?php

// routes_path
if (!function_exists('routes_path')) {
    /**
     * Get the path to the routes directory.
     *
     * @param string $directory
     * @return string
     */
    function routes_path(string $directory = '', string $stubPath = null): string
    {
        return isset($stubPath)
            ? "$stubPath/routes/$directory"
            : app()->basePath("routes/$directory");
    }
}
