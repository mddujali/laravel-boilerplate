<?php

declare(strict_types=1);

namespace App\Support\Traits\Models;

use Illuminate\Database\Eloquent\Model;

trait HasUuid
{
    protected static function booted(): void
    {
        static::creating(function (Model $model): void {
            $model->setAttribute('uuid', str()->uuid()->toString());
        });
    }
}
