<?php

namespace Database\Seeders;

use App\Models\ChildMessage;
use Illuminate\Database\Seeder;

class ChildMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $childmsgs = [
            [
                'message_id' => 1,
                'body' => 'Hello, I am a child message',
                'sender_id' => 2,
                'created_at' => now(),
            ],
            [
                'message_id' => 1,
                'body' => 'Hello, I am a child message',
                'sender_id' => 3,
                'created_at' => now(),
            ]
        ];

        ChildMessage::insert($childmsgs);
    }
}
