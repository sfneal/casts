<?php

namespace Sfneal\Casts\Tests;

use Sfneal\Casts\Tests\Models\People;

class NullableIntArrayCastTest extends TestCase
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
    }

    /** @test */
    public function attribute_is_mutated_correctly()
    {
        $this->model->update([
            'favorites' => [1, 2, 3],
        ]);

        $this->assertEquals(
            [1, 2, 3],
            $this->model->favorites
        );
    }

    /** @test */
    public function attribute_is_accessed_correctly()
    {
        $this->model->update([
            'favorites' => [],
        ]);

        $this->assertEquals(
            [],
            $this->model->favorites
        );
    }
}
