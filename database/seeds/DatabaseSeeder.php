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
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'alazim@gmail.com',
            'password' => Hash::make('secret123'),
            'password2' => 'secret123',
            'role' => 2,
        ]);
    }
}
