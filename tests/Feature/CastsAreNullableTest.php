<?php

namespace Sfneal\Casts\Tests\Feature;

use Sfneal\Casts\Tests\Models\People;
use Sfneal\Casts\Tests\TestCase;

class CastsAreNullableTest extends TestCase
{
    /**
     * @var People
     */
    public $model;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->model = $this->models->random();

        $this->model->update([
            'birthday' => null,
            'bio' => null,
            'favorites' => null,
        ]);
    }

    /** @test */
    public function attribute_is_mutated_correctly()
    {
        $this->assertSame(null, $this->model->getRawOriginal('birthday'));
        $this->assertSame(null, $this->model->getRawOriginal('bio'));
        $this->assertSame(null, $this->model->getRawOriginal('favorites'));
    }

    /** @test */
    public function attribute_is_accessed_correctly()
    {
        $this->assertSame(null, $this->model->birthday);
        $this->assertSame(null, $this->model->bio);
        $this->assertSame(null, $this->model->favorites);
    }
}
