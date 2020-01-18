<?php

use App\User;
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
        User::create([
            'name' => 'Yoel Diomedez',
            'email' => 'yoeldiomedez@gmail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'name' => 'Karla Veronica',
            'email' => 'karlaveronica@gmail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'name' => 'Luz Fatima',
            'email' => 'luzfatima@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
