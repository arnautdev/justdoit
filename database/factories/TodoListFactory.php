<?php

namespace Database\Factories;

use App\Models\TodoList;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TodoList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(100),
            'toDate' => $this->faker->dateTimeBetween(date('Y-01-01 H:i:s'), date('Y-m-d H:i:s')),
            'isDone' => $this->faker->randomElement(['yes', 'no'])
        ];
    }
}
