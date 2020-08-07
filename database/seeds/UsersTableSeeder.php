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
            [
                'name' => 'TEST USER',
                'email' => 'guest@guest.com',
                'password' => bcrypt('guestpass'),
            ],
        ]);
    }
}
