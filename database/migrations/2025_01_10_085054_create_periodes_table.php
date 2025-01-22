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
        Schema::create('periodes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('periode_id')->nullable(); // Add nullable if it's optional
            $table->foreign('periode_id')->references('id')->on('periodes'); // Foreign key constraint
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['periode_id']); // Drop foreign key constraint first
            $table->dropColumn('periode_id');    // Drop the column after foreign key
        });
    
        Schema::dropIfExists('periodes');
        
    }
    
};
