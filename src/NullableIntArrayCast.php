<?php

namespace Sfneal\Casts;

use Sfneal\LaravelCustomCasts\CustomCastBase;

class NullableIntArrayCast extends CustomCastBase
{
    /**
     * Cast the $value as an array of integer values.
     *
     *  - set to null if an empty array or null value is passed
     *
     * @param $value
     * @return string
     */
    public function setAttribute($value): ?string
    {
        return ! is_null($value) ? json_encode(array_map('intval', $value)) : null;
    }

    /**
     * Retrieve an array of values.
     *
     * @param $value
     * @return array
     */
    public function castAttribute($value): array
    {
        return json_decode($value, true);
    }
}
