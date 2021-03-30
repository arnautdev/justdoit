<?php

namespace Database\Factories;

use App\Models\Goal;
use App\Models\GoalAction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class GoalActionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GoalAction::class;

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
            'weekDays' => $this->faker->randomElements([1, 2, 3, 4, 5, 6, 7], 3),
            'addToTodoList' => $this->faker->randomElement(['yes', 'no']),
        ];
    }

    /**
     * @return GoalActionFactory
     */
    public function setUserId($goal)
    {
        return $this->state(function (array $attributes) use ($goal) {
            return [
                'userId' => $goal->userId,
            ];
        });
    }

    /**
     * @return GoalActionFactory
     */
    public function setGoalId($goal)
    {
        return $this->state(function (array $attributes) use ($goal) {
            return [
                'goalId' => $goal->id,
            ];
        });
    }
}
