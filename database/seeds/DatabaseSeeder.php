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
<<<<<<< HEAD
        // DB::table('users')->insert([
        //     'firstname' => 'admin',
        //     'lastname' => 'kisil',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('admin'),
        //     'type' => '1',
        // ]);

        DB::table('users')->insert([
=======
        DB::table('users')->insert([
            'firstname' => 'admin',
            'lastname' => 'kisil',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'type' => '1',
        ],
        [
>>>>>>> 088beae0a9cdf46b98da6c746c482c6a5cd1acb1
            'firstname' => 'nikko',
            'lastname' => 'men',
            'email' => 'nikko@gmail.com',
            'password' => bcrypt('nikko'),
            'type' => '0',
        ]    
        );

    }
}
