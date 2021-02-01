<?php

namespace Sfneal\Casts;

use Sfneal\LaravelCustomCasts\CustomCastBase;

class NewlineCast extends CustomCastBase
{
    /**
     * Transcode newline characters as html <br> chars.
     *
     * @param mixed $value
     * @return string
     */
    public function setAttribute($value): ?string
    {
        return $value;
    }

    /**
     * Transcode newline characters as html <br> chars.
     *
     * @param mixed $value
     * @return string
     */
    public function castAttribute($value): ?string
    {
        return ! empty($value) ? nl2br($value) : null;
    }
}
