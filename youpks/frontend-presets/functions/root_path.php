<?php

// root_path
if (!function_exists('root_path')) {
    /**
     * Get the root path of the package.
     *
     * @param string|null $directory
     * @return string
     */
    function root_path(string $directory = null): string
    {
        return base_path('vendor/youpks/frontend-presets/').$directory ?? '';
    }
}
