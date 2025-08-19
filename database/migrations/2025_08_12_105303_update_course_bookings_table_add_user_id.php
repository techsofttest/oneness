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
        Schema::table('course_bookings', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'password']);
            $table->unsignedBigInteger('user_id')->after('id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_bookings', function (Blueprint $table) {
            // Restore old columns
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();

            // Remove user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
