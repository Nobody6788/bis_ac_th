<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if users table exists
        if (!\Schema::hasTable('users')) {
            $this->command->error('Users table does not exist. Please run migrations first.');
            return;
        }

        // Check if superadmin already exists
        if (DB::table('users')->where('email', 'superadmin@example.com')->exists()) {
            $this->command->info('Superadmin user already exists.');
            return;
        }

        // Create superadmin user
        $userId = DB::table('users')->insertGetId([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'), // Change this password in production
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assign superadmin role if using role management
        if (\Schema::hasTable('model_has_roles')) {
            $superAdminRole = DB::table('roles')->where('name', 'superadmin')->first();
            
            if ($superAdminRole) {
                DB::table('model_has_roles')->insert([
                    'role_id' => $superAdminRole->id,
                    'model_type' => 'App\\Models\\User',
                    'model_id' => $userId
                ]);
            }
        }

        $this->command->info('Superadmin user created successfully!');
        $this->command->info('Email: superadmin@example.com');
        $this->command->info('Password: password');
        $this->command->warn('IMPORTANT: Change this password immediately after first login!');
    }
}
