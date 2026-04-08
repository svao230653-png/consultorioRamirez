<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ramirez.com'],
            [
                'nombre' => 'Administrador General',
                'password' => Hash::make('Admin12345'),
                'telefono' => '7771234567',
                'rol' => 'administrador',
            ]
        );
    }
}