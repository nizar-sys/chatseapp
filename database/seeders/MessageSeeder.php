<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $msgs = [
            [
                'to_id' => 1,
                'from_id' => 2,
                'created_at' => now(),
            ],
            [
                'to_id' => 1,
                'from_id' => 3,
                'created_at' => now(),
            ]
        ];

        Message::insert($msgs);
    }
}
