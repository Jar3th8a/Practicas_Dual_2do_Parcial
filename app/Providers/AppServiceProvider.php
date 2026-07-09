<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Fortify;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Forzar el esquema HTTPS (Comentado temporalmente para pruebas locales)
        // URL::forceScheme('https');

        // 2. Log de consultas para auditoría (solo en desarrollo)
        if (config('app.debug')) {
            DB::listen(function ($query) {
                Log::channel('daily')->info('SQL Query', [
                    'sql'      => $query->sql,
                    'bindings' => $query->bindings,
                    'time'     => $query->time . 'ms',
                ]);
            });
        }

        // 3. Registrar la vista del challenge de Fortify
        Fortify::twoFactorChallengeView(function () {
            return view('auth.two-factor-challenge');
        });

        // 4. Registrar la vista de Login
        Fortify::loginView(function () {
            return view('auth.login'); 
        });

        // 5. Configurar el Rate Limiter para el login de Fortify
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->input('email');
            return Limit::perMinute(5)->by($email . $request->ip());
        });
    }   
}