<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // 1. Forzar el esquema HTTPS
        URL::forceScheme('https');

        // 2. Si existe _FILE, leer el secreto desde el archivo
        foreach ($_ENV as $key => $value) {
            if (str_ends_with($key, '_FILE') && file_exists($value)) {
                $realKey = str_replace('_FILE', '', $key);
                $secret  = trim(file_get_contents($value));
                
                config([strtolower(str_replace('_', '.', $realKey)) => $secret]);
                putenv("$realKey=$secret");
            }
        }
    }
}