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
        Schema::table('features', function (Blueprint $table) {
            // Change app_id to not null and add foreign key to apps table
        $table->unsignedBigInteger('app_id')->nullable(false)->change(); // Change app_id to not null
        $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade'); // Add foreign key constraint
        $table->enum('vote_type', ['Rate 1 to 10', 'Like & Dislike'])->after('app_id')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('features', function (Blueprint $table) {
            $table->dropColumn('user_id'); // Drop the user_id column if needed
            $table->unsignedBigInteger('user_id')->nullable()->after('id'); // Recreate user_id as unsignedBigInteger
        });
    }
};
