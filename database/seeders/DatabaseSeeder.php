<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Notifications\NewMessageNotification;
use App\Notifications\OrderShippedNotification;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $user = \App\Models\User::first();

        for ($i = 0; $i <= 10; $i++) {
            $user->notify(new OrderShippedNotification());
        }

        for ($i = 0; $i <= 20; $i++) {
            $user->notify(new NewMessageNotification());
        }
    }
}
