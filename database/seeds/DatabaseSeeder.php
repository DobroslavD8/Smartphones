<?php

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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => str_random(5),
            'email' => str_random(5).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
