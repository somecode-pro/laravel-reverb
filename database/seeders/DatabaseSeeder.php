<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Михал Палыч',
            'email' => 'user@example.com',
        ]);

        foreach (User::factory(3)->create() as $recipient) {
            Chat::query()->create([
                'initiator_id' => $user->id,
                'recipient_id' => $recipient->id,
            ]);
        }
    }
}
