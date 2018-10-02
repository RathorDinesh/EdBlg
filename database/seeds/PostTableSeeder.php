<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
        
        	'title' => 'Title one',
        	'body'  => 'Content One',
        	'category_id' => 1,
        	'user_id' => 1
        ]);

        DB::table('posts')->insert([
        
        	'title' => 'Title Two',
        	'body'  => 'Content Two',
        	'category_id' => 2,
        	'user_id' => 2
        ]);
    }
}
