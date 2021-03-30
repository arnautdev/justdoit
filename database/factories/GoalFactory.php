<?php

namespace Database\Factories;

use App\Models\Goal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class GoalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Goal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(200),
            'isDone' => $this->faker->randomElement(['yes', 'no']),
            'startDate' => $this->faker->dateTimeBetween(date('Y-01-01 H:i:s'), date('Y-02-01 H:i:s')),
            'endDate' => $this->faker->dateTimeBetween(date('Y-04-01 H:i:s'), date('Y-07-01 H:i:s')),
        ];
    }

    /**
     * @return GoalFactory
     */
    public function setUserId()
    {
        return $this->state(function (array $attributes) {
            $userIds = DB::table('clients')->get()->pluck('id', 'id');

            return [
                'userId' => $this->faker->randomElement($userIds),
            ];
        });
    }
}
