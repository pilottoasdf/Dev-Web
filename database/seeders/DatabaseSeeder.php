<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(PreferenciaSeeder::class);
        $this->call(QuizSeeder::class);
        $this->call(ProgressoQuizSeeder::class);
        $this->call(JogoSeeder::class);

    }
}
