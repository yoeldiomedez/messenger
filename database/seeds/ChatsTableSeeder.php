<?php

use App\Chat;
use Illuminate\Database\Seeder;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chat::create([
            'user_id'      => 1,
            'contact_id'   => 2,
            'last_message' => null,
            'last_time'    => null
        ]);

        Chat::create([
            'user_id'      => 2,
            'contact_id'   => 1,
            'last_message' => null,
            'last_time'    => null
        ]); 

        Chat::create([
            'user_id'      => 1,
            'contact_id'   => 3,
            'last_message' => null,
            'last_time'    => null
        ]);

        Chat::create([
            'user_id'      => 3,
            'contact_id'   => 1,
            'last_message' => null,
            'last_time'    => null
        ]);
    }
}
