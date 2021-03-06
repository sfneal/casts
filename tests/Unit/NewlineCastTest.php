<?php

namespace Sfneal\Casts\Tests\Unit;

use Sfneal\Casts\Tests\Feature\MigrationTest;
use Sfneal\Casts\Tests\Models\People;
use Sfneal\Casts\Tests\TestCase;

class NewlineCastTest extends TestCase
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
            'bio' => MigrationTest::getBio(),
        ]);
    }

    /** @test */
    public function attribute_is_mutated_correctly()
    {
        $this->assertEquals(
            $this->model->getRawOriginal('bio'),
            MigrationTest::getBio()
        );
    }

    /** @test */
    public function attribute_is_accessed_correctly()
    {
        $this->assertEquals(
            nl2br(MigrationTest::getBio()),
            $this->model->bio
        );
    }
}
