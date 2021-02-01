<?php

namespace Sfneal\Casts\Tests\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sfneal\Casts\CarbonCast;
use Sfneal\Casts\NewlineCast;
use Sfneal\Casts\NullableIntArrayCast;
use Sfneal\Casts\Tests\Factories\PeopleFactory;
use Sfneal\LaravelCustomCasts\HasCustomCasts;

class People extends Model
{
    use HasCustomCasts;
    use HasFactory;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected $table = 'people';
    protected $primaryKey = 'person_id';

    protected $fillable = [
        'person_id',
        'name_first',
        'name_last',
        'email',
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

    public function getNameFullAttribute(): string
    {
        return "{$this->name_first} {$this->name_last}";
    }

    public function getNameLastFirstAttribute(): string
    {
        return "{$this->name_last}, {$this->name_first}";
    }

    public function getAgeAttribute(): int
    {
        return $this->birthday
            ->diff(Carbon::now())
            ->format('%y');
    }
}