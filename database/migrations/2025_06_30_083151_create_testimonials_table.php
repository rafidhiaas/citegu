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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('author_company')->nullable(); // Boleh kosong
            $table->string('author_role')->nullable();    // Boleh kosong
            $table->text('content');
            $table->integer('rating')->nullable();        // Rating 1-5, boleh kosong jika tidak diisi
            $table->string('status')->default('pending'); // Default status: pending, agar perlu approval
            $table->string('image')->nullable();          // Untuk path gambar testimonial (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};