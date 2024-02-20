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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // `id`, unsigned big integer (20), primary key, autoincrement
            $table->foreignId('movie_id'); // same type as id - unsigned big integer (20)
            $table->text('text'); // `text`
            $table->timestamps();   // `created_at` (TIMESTAMP)
                                    // `updated_at` (TIMESTAMP)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
