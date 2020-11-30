<?php

namespace Sfneal\Casts;

use Sfneal\LaravelCustomCasts\CustomCastBase;

class NewlineCast extends CustomCastBase
{
    /**
     * Transcode newline characters as html <br> chars.
     *
     * @param string $value
     * @return string
     */
    public function setAttribute($value)
    {
        return $value;
    }

    /**
     * Transcode newline characters as html <br> chars.
     *
     * @param string $value
     * @return string
     */
    public function castAttribute($value)
    {
        return ! empty($value) ? nl2br($value) : null;
    }
}
