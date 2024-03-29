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
        Schema::create('movie_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_type_id');
            $table->string('name');
            $table->string('full_name');
            $table->string('length')->nullable();
            $table->string('email');
            $table->string('year')->nullable();
            $table->string('start_year')->nullable();
            $table->string('end_year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_requests');
    }
};
