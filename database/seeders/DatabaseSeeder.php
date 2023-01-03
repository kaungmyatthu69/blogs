<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
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
        // \App\Models\User::factory( )->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Category::truncate();
        // Blog::truncate();
        // User::truncate();

        // $frontend=Category::create([
        //     'name'=>'Frontend Post',
        //     'slug'=>'frontend-post',

        // ]);
        // $backend= Category::create([
        //     'name'=>'Backend Post',
        //     'slug'=>'backend-post',

        // ]);
        // Blog::create([
        //     'title'=>'Frontend post',
        //     'slug'=>'frontend-post',
        //     'intro'=>'A common performance bottleneck of modern web applications is the amount of time they spend querying databases.',
        //     'body'=>'A common performance bottleneck of modern web applications is the amount of time they spend querying databases. Thankfully, Laravel can invoke a closure or callback of your choice when it spends too much time querying the database during a single request. To get started, provide a query time threshold (in milliseconds) and closure to th',
        //     'category_id'=>$frontend->id
        // ]);
        // Blog::create([
        //     'title'=>'Backend post',
        //     'slug'=>'backend-post',
        //     'intro'=>'A common performance bottleneck of modern web applications is the amount of time they spend querying databases.',
        //     'body'=>'A common performance bottleneck of modern web applications is the amount of time they spend querying databases. Thankfully, Laravel can invoke a closure or callback of your choice when it spends too much time querying the database during a single request. To get started, provide a query time threshold (in milliseconds) and closure to th',
        //     'category_id'=>$backend->id
        // ]);
            // User::factory()->create();
       $mgmg=User::factory()->create(['name'=>'Mg Mg','username'=>'mgmg']);
       $aungaung=User::factory()->create(['name'=>'Aung Aung','username'=>'aungaung']);

        $frontend=Category::factory()->create(['name'=>'frontend post','slug'=>'frontend-post']);
        $backend=Category::factory()->create(['name'=>'backend post','slug'=>'backend-post']);
            Blog::factory(2)->create(['category_id'=>$frontend->id,'user_id'=>$mgmg->id]);
            Blog::factory(2)->create(['category_id'=>$backend->id,'user_id'=>$aungaung->id]);

    }
}
