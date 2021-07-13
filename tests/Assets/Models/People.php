<?php

namespace Sfneal\Casts\Tests\Assets\Models;

use Carbon\Carbon;
use Sfneal\Casts\CarbonCast;
use Sfneal\Casts\NewlineCast;
use Sfneal\Casts\NullableIntArrayCast;
use Sfneal\Casts\Tests\Assets\Factories\PeopleFactory;
use Vkovic\LaravelCustomCasts\HasCustomCasts;

class People extends \Sfneal\Testing\Models\People
{
    use HasCustomCasts;

    protected $fillable = [
        'person_id',
        'name_first',
        'name_last',
        'email',
        'age',
        'birthday',
        'bio',
        'favorites',
    ];

    /**
     * @var array Attributes that should be type cast
     */
    protected $casts = [
        'birthday' => CarbonCast::class,
        'bio' => NewlineCast::class,
        'favorites' => NullableIntArrayCast::class,
    ];

    /**
     * Model Factory.
     *
     * @return PeopleFactory
     */
    protected static function newFactory(): PeopleFactory
    {
        return new PeopleFactory();
    }

    /**
     * Retrieve the 'age' attribute.
     *
     * @param $value
     * @return int
     */
    public function getAgeAttribute($value): int
    {
        return $value ?? $this->birthday->diff(Carbon::now())->format('%y');
    }
}
