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
        // DB::table('users')->insert([
        //     'firstname' => 'admin',
        //     'lastname' => 'kisil',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('admin'),
        //     'type' => '1',
        // ]);

        DB::table('users')->insert([
            'firstname' => 'nikko',
            'lastname' => 'men',
            'email' => 'nikko@gmail.com',
            'password' => bcrypt('nikko'),
            'type' => '0',
        ]);
    }
}
