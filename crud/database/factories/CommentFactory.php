<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post_id = DB::table('posts')->pluck('id');
        return [
            'post_id' => $this->faker->unique()->randomElement($post_id),
            'comments' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeBetween('-6 month','-1 month'),
        ];
    }
}
