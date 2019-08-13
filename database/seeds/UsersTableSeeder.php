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
			'name' => 'Shakil',
			'email' => 'inverse.shakil@gmail.com',
			'password' => bcrypt('123456'),
			'role' => 1,
		]);
	
		DB::table('users')->insert([
			'name' => 'Atul',
			'email' => 'atul@gmail.com',
			'password' => bcrypt('123456'),
			'role' => 2,
		]);
    }
}
