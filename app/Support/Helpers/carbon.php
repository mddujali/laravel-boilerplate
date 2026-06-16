<?php

declare(strict_types=1);

/**
 * Carbon-specific helpers.
 */

use Carbon\Carbon;

if (!function_exists('carbon')) {
    function carbon($time = null, $tz = null): Carbon
    {
        return new Carbon($time, $tz);
    }
}
