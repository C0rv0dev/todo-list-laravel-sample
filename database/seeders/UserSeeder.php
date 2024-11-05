<?php

namespace Database\Seeders;

use App\Enums\PriorityEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)
            ->hasTodos(5)
            ->create();

        $user = User::create([
            'name' => 'Nicolas',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);

        for($i = 0; $i < 15; $i++) {
            $user->todos()->create([
                'title' => 'Test Todo',
                'content' => 'Test Content',
                'priority' => PriorityEnum::getRandom(),
            ]);
        }
    }
}