<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Path gambar logo produk
            $table->string('category'); // Misalnya: 'filter-hardware', 'filter-software'
            $table->string('details_link')->nullable(); // Tautan ke halaman detail produk
            $table->boolean('is_active')->default(true); // Status aktif/non-aktif
            $table->timestamps();
        });

        // Opsional: Jika Anda ingin kategori juga dinamis
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: "Data Center Hardware Facility"
            $table->string('slug')->unique(); // Contoh: "filter-hardware"
            $table->timestamps();
        });

        // Jika ada tabel product_categories, tambahkan foreign key ke products
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained('product_categories')->onDelete('set null');
            // Ganti 'category' string di atas dengan 'category_id' jika menggunakan tabel kategori terpisah
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_categories'); // Drop juga jika ada
    }
};