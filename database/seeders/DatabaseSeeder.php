<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        //User::create([
            //'name' => 'testing',
            //'username' => 'gornal',
            //'password' => 'testes',
            //'email' => 'deliverindihom@gmail.com',
            //'email_verified_at' => now()
        //]);
        
        User::factory(4)->create();

        Category::create([
            'name'=> 'Program',
            'slug' => 'program'
        ]);

        Category::create([
            'name'=> 'Tutorial',
            'slug' => 'tutorial'
        ]);
        
        Category::create([
            'name'=> 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();
    }
}
