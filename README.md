# Casts

[![Packagist PHP support](https://img.shields.io/packagist/php-v/sfneal/casts)](https://packagist.org/packages/sfneal/casts)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/sfneal/casts.svg?style=flat-square)](https://packagist.org/packages/sfneal/casts)
[![Build Status](https://travis-ci.com/sfneal/casts.svg?branch=master&style=flat-square)](https://travis-ci.com/sfneal/casts)
[![StyleCI](https://github.styleci.io/repos/287554375/shield?branch=master)](https://github.styleci.io/repos/287554375?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sfneal/casts/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sfneal/casts/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/sfneal/casts.svg?style=flat-square)](https://packagist.org/packages/sfneal/casts)

An alternative implementation of the Eloquent Model accessors & mutators pattern for type casting attributes

## Installation

You can install the package via composer:

```bash
composer require sfneal/casts
```

## Usage

In order to make use of the attribute type Casts add the `HasCustomCasts` trait to your model before definition attributes that should be cast to custom types.

``` php
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Sfneal\Casts\CarbonCast;
use Sfneal\Casts\NewlineCast;
use Sfneal\Casts\NullableIntArrayCast;
use Sfneal\LaravelCustomCasts\HasCustomCasts;

class People extends Model
{
    use HasCustomCasts;

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
}
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email stephen.neal14@gmail.com instead of using the issue tracker.

## Credits

- [Stephen Neal](https://github.com/sfneal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).
