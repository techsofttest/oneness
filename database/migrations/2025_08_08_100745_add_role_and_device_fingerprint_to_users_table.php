<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::table('users', function (Blueprint $table) {
            // Role: default 'user', can be 'admin', 'user', etc.
            $table->string('role')->default('user')->after('password');

            // Device fingerprint: unique ID from browser/device
            $table->string('device_fingerprint')->nullable()->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'device_fingerprint']);
        });
    }
};
