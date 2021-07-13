<?php

namespace Sfneal\Casts\Tests\Assets\Factories;

use Sfneal\Casts\Tests\Assets\Models\People;

class PeopleFactory extends \Database\Factories\PeopleFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'name_first' => $this->faker->firstName,
            'name_last' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'birthday' => $this->faker->dateTime,
            'bio' => $this->faker->paragraphs(3, true),
            'favorites' => $this->faker->randomElements(
                range(1, 6),
                random_int(0, 4)
            ),
        ];
    }
}
