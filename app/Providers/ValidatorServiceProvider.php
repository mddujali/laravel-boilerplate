<?php

declare(strict_types=1);

namespace App\Providers;

use App\Support\Validators\BooleanAlphaValidator;
use App\Support\Validators\BooleanAnyValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Override;

class ValidatorServiceProvider extends ServiceProvider
{
    protected array $validators = [
        'boolean_alpha' => BooleanAlphaValidator::class,
        'boolean_any' => BooleanAnyValidator::class,
    ];

    /**
     * Register services.
     */
    #[Override]
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        foreach ($this->validators as $key => $value) {
            Validator::extend($key, $value);
        }
    }
}
