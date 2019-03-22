<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//~ DB::table('users')->insert([
            //~ 'name' => Str::random(10),
            //~ 'email' => Str::random(10).'@gmail.com',
            //~ 'password' => bcrypt('secret'),
        //~ ]);
        
        //~ factory(App\User::class, 1)->create();
        
        App\User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('admin')
        ]);
        
        factory(App\User::class, 5)->create()->each(function ($user) {
	        $user->posts()->saveMany(
				factory(App\Post::class, 2)->create()->each(function ($post) {
					$post->comments()->saveMany(
						factory(App\Comment::class, 4)->make());
				})
			);
	    });
    }
}
