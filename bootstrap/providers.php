<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use App\Providers\HelperServiceProvider;
use App\Providers\ValidatorServiceProvider;

return [
    AppServiceProvider::class,
    HelperServiceProvider::class,
    ValidatorServiceProvider::class,
];
