<?php

namespace Sfneal\Casts;

use Carbon\Carbon;
use DateTime;
use Exception;
use Sfneal\LaravelCustomCasts\CustomCastBase;

class CarbonCast extends CustomCastBase
{
    /**
     * Store value as time code string.
     *
     * @param mixed $value
     * @return DateTime
     */
    public function setAttribute($value): ?DateTime
    {
        return $value;
    }

    /**
     * Retrieve value as Carbon instance.
     *
     * @param mixed $value
     * @return Carbon
     * @throws Exception
     */
    public function castAttribute($value): ?Carbon
    {
        return ! is_null($value) ? new Carbon($value) : null;
    }
}
