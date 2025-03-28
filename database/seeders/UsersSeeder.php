<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jorge',
            'email' => 'jorge@teste.com',
            'password' => '123456',
        ]);
        User::create([
            'name' => 'Pedro',
            'email' => 'pedro@teste.com',
            'password' => '123456',
        ]);
        User::create([
            'name' => 'Maria',
            'email' => 'maria@teste.com',
            'password' => '123456',
        ]);
        User::create([
            'name' => 'Josefa',
            'email' => 'josefa@teste.com',
            'password' => '123456',
        ]);
        User::create([
            'name' => 'Lucas',
            'email' => 'lucas@teste.com',
            'password' => '123456',
        ]);
        User::create([
            'name' => 'matheus',
            'email' => 'matheus@teste.com',
            'password' => '123456',
        ]);
        User::create([
            'name' => 'lourdes',
            'email' => 'lourdes@teste.com',
            'password' => '123456',
        ]);
        User::create([
            'name' => 'jairo',
            'email' => 'jairo@teste.com',
            'password' => '123456',
        ]);
        User::create([
            'name' => 'bart',
            'email' => 'bart@teste.com',
            'password' => '123456',
        ]);
        User::create([
            'name' => 'gerusa',
            'email' => 'gerusa@teste.com',
            'password' => '123456',
        ]);
    }
}
