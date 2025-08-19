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
        Schema::table('coursesnews', function (Blueprint $table) {
            $table->boolean('expiring_soon')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coursesnews', function (Blueprint $table) {
            $table->dropColumn('expiring_soon');
        });
    }
};
