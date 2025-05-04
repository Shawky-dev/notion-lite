<?php

namespace Database\Seeders;

use App\Models\Board;
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

        $users = User::factory(10)->create();

        $boards = Board::factory(5)->create();

        foreach ($boards as $board) {
            // Pick 2 to 5 random users to join this board
            $selectedUsers = $users->random(rand(2, 5));

            foreach ($selectedUsers as $user) {
                // Use the addUser() method from the Board model
                $board->addUser(
                    $user,
                    fake()->randomElement(['admin', 'member']) // random role
                );
            }
        }
    }
}
