<?php

namespace Sfneal\Casts\Tests;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Sfneal\Casts\Tests\Models\People;
use Sfneal\Casts\Tests\Providers\TestingServiceProvider;

class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;

    /**
     * @var People|Collection
     */
    public $models;

    /**
     * Register package service providers.
     *
     * @param Application $app
     * @return array|string
     */
    protected function getPackageProviders($app)
    {
        return TestingServiceProvider::class;
    }

    /**
     * Define environment setup.
     *
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/migrations/create_people_table.php.stub';

        (new \CreatePeopleTable())->up();
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        // Create model factories
        $this->models = People::factory()
            ->count(20)
            ->create();
    }
}
