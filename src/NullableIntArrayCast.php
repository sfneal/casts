<?php


namespace Sfneal\Casts;

use Vkovic\LaravelCustomCasts\CustomCastBase;

class NullableIntArrayCast extends CustomCastBase
{
    /**
     * json_decode the $value
     *
     * @param $value
     * @return string
     */
    public function setAttribute($value)
    {
        return !is_null($value) ? json_encode(array_map('intval', $value)) : null;
    }

    /**
     * json_encode the $value or return null
     *
     * @param $value
     * @return string
     */
    public function castAttribute($value)
    {
        return json_decode($value, true);
    }
}
