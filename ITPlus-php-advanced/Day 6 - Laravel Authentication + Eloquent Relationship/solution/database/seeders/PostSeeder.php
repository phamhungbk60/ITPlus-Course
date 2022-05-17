<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(10)->create();
    }
}
