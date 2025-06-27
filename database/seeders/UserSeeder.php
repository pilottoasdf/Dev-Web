<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Arend',
            'email' => 'brunoarend01@gmail.com',
            'nivel_acesso' => '1',
            'password' => Hash::make('baleia01'),
            'escolaridade' => 'Ensino Médio',
            'data_nasc' => '2007-08-07',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'name' => 'Kauã',
            'email' => 'kaua@gmail.com',
            'nivel_acesso' => '1',
            'password' => Hash::make('senha01'),
            'escolaridade' => 'Ensino Fundamental I',
            'data_nasc' => '2007-11-27',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'name' => 'Ana',
            'email' => 'ana@gmail.com',
            'nivel_acesso' => '1',
            'password' => Hash::make('senha01'),
            'escolaridade' => 'Ensino Fundamental II',
            'data_nasc' => '2008-02-20',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'name' => 'Diego',
            'email' => 'diego@gmail.com',
            'nivel_acesso' => '2',
            'password' => Hash::make('senha01'),
            'escolaridade' => 'Ensino Superior',
            'data_nasc' => '1990-05-03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'name' => 'Ronaldo',
            'email' => 'ronaldo@gmail.com',
            'nivel_acesso' => '2',
            'password' => Hash::make('senha01'),
            'escolaridade' => 'Ensino Superior',
            'data_nasc' => '1993-07-15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'name' => 'Homero',
            'email' => 'homero@gmail.com',
            'nivel_acesso' => '2',
            'password' => Hash::make('senha01'),
            'escolaridade' => 'Ensino Superior',
            'data_nasc' => '1958-03-13',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'name' => 'Rosmari',
            'email' => 'rosmari@gmail.com',
            'nivel_acesso' => '2',
            'password' => Hash::make('senha01'),
            'escolaridade' => 'Ensino Superior',
            'data_nasc' => '1989-06-04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'name' => 'Claúdio',
            'email' => 'claudio@gmail.com',
            'nivel_acesso' => '2',
            'password' => Hash::make('senha01'),
            'escolaridade' => 'Ensino Superior',
            'data_nasc' => '1984-09-30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
