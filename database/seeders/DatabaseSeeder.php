<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Md. Najib Islam',
            'email' => 'developernajib@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123456789),
            'remember_token' => Str::random(10),
        ]);
        
        User::factory(10)->create();
    }
}
