<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$cMaIqx5FQ7.ZCpFyKWnBme55StIYhKL7VBrRPpWv1q6jo3ibzrqNW', // password
       
       ]);
       $user->assignRole('admin');
    }
}
