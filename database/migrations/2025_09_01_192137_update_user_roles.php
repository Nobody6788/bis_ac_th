<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, update existing 'user' roles to 'admin'
        DB::table('users')
            ->where('role', 'user')
            ->update(['role' => 'admin']);
            
        // Then modify the column to only allow 'superadmin' and 'admin'
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('superadmin', 'admin') NOT NULL DEFAULT 'admin'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original enum values if needed
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('superadmin', 'admin', 'user') NOT NULL DEFAULT 'user'");
    }
};
