<?php

namespace Sfneal\Casts\Tests;

use Carbon\Carbon;
use Sfneal\Casts\Tests\Models\People;

class CarbonCastTest extends TestCase
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
            'birthday' => \DateTime::createFromFormat('m-d-Y', '11-27-1995')
        ]);
    }

    /** @test */
    public function attribute_is_mutated_correctly()
    {
        $this->assertEquals(
            $this->model->getRawOriginal('birthday'),
            (new Carbon(\DateTime::createFromFormat('m-d-Y', '11-27-1995')))->toDate()
        );
    }

    /** @test */
    public function attribute_is_accessed_correctly()
    {
        $this->assertEquals(
            '11-27-1995',
            $this->model->birthday->format('m-d-Y')
        );
    }
}
