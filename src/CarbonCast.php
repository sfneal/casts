<?php

namespace Sfneal\Casts;

use Carbon\Carbon;
use Exception;
use Vkovic\LaravelCustomCasts\CustomCastBase;

class CarbonCast extends CustomCastBase
{
    /**
     * Store value as time code string.
     *
     * @param string $value
     * @return string
     */
    public function setAttribute($value)
    {
        return $value;
    }

    /**
     * Retrieve value as Carbon instance.
     *
     * @param string $value
     * @return Carbon
     * @throws Exception
     */
    public function castAttribute($value)
    {
        return new Carbon($value);
    }
}
