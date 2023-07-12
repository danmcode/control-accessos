<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AccessControl\IdentificationType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $identificationType = IdentificationType::create([
            'initials' => 'C.C',
            'name' => 'Cedula de Ciudadania',
        ]);

        $User = '\App\Models\User';

        $User::create([
            'username' => 'admin',
            'identification' => '12313113',
            'identification_type' => 1,
            'name' => 'Administrador',
            'last_name' => '',
            'email' => 'administrador@protecnicaing.com',
            'role_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'password' => Hash::make('password'),
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
