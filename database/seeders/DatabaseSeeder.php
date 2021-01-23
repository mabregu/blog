<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::factory(5)->create();
        \App\Models\Tag::factory(5)->create();
        \App\Models\Post::factory(50)->create();
        \App\Models\User::factory(5)->create();
    }
}
