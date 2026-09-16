<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\ActivityCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       => User::query()->inRandomOrder()->value('id'),
            'category_id'   => ActivityCategory::query()->inRandomOrder()->value('id'),
            'description'   => fake()->sentence(),
            'started_time'  => fake()->time(),
            'finished_time' => fake()->time()
        ];
    }
}
