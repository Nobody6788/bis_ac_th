<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin users if they don't exist
        $adminUsers = [
            [
                'email' => 'admin@bis.edu',
                'name' => 'BIS Administrator',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'superadmin@bis.edu',
                'name' => 'BIS Super Administrator',
                'password' => Hash::make('superadmin123'),
                'role' => 'superadmin',
                'email_verified_at' => now(),
            ]
        ];

        foreach ($adminUsers as $user) {
            User::firstOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
        
        // Remove any non-admin users
        User::whereNotIn('role', ['admin', 'superadmin'])->delete();
    }
}
