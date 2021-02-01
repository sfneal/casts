<?php

namespace Sfneal\Casts\Tests;

use Carbon\Carbon;
use Sfneal\Casts\Tests\Models\People;

class ModelFactoryTest extends TestCase
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
    public function fillables_are_correct_types()
    {
        $this->assertIsString($this->model->name_first);
        $this->assertIsString($this->model->name_last);
        $this->assertStringContainsString('@', $this->model->email);
    }

    /** @test */
    public function attributes_are_correct_types()
    {
        $this->assertIsString($this->model->name_full);
        $this->assertStringContainsString(', ', $this->model->name_last_first);
        $this->assertStringContainsString($this->model->name_first, $this->model->name_full);
        $this->assertStringContainsString($this->model->name_last, $this->model->name_full);
    }

    /** @test */
    public function casts_are_correct_types()
    {
        // Cast attributes
        $this->assertInstanceOf(Carbon::class, $this->model->birthday);
        $this->assertIsString($this->model->bio);
        $this->assertIsArray($this->model->favorites);
        $this->assertIsInt($this->model->age);
    }
}
