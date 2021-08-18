<?php

namespace Database\Seeders;

use App\Models\tags;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tags::create(['tags' => 'C']);
        tags::create(['tags' => 'C++']);
        tags::create(['tags' => 'Python']);
        tags::create(['tags' => 'PHP']);
    }
}
