<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'role_id' => 1,
        	'is_active' => 1,
        	'name' => 'Dinesh',
        	'email' => 'd@gmail.com',
        	'password' => bcrypt('password'),
            'created_at' => '2018-09-29 09:52:29',
            'updated_at' => '2018-09-29 09:52:29'

        ]);
    }
}
