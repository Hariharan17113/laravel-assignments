<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_id = DB::table('users')->pluck('id');
        return [
            'user_id' => $this->faker->randomElement($user_id),
            'title' => $this->faker->title,
            'description' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeBetween('-6 month','-1 month'),
        ];
    }
}
