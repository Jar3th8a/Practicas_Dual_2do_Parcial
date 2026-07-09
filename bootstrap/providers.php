<?php

use App\Providers\AppServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\DockerSecretsProvider::class,
    Laravel\Fortify\FortifyServiceProvider::class,
];
