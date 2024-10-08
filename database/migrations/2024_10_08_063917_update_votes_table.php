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
        Schema::table('votes', function (Blueprint $table) {
            // Change user_id to string, nullable, and remove foreign key
            $table->dropForeign(['user_id']); // Drop the foreign key constraint if it exists
            $table->string('user_id')->nullable()->change(); // Change user_id to string and nullable
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('votes', function (Blueprint $table) {
            // Rollback changes
            $table->dropForeign(['app_id']); // Drop the foreign key constraint for app_id
            $table->unsignedBigInteger('app_id')->nullable()->change(); // Change app_id back to nullable
        });
    }
};
