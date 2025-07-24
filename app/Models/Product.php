<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'category', // Atau 'category_id' jika pakai foreign key
        'details_link',
        'is_active',
    ];

    // Jika Anda menggunakan tabel kategori terpisah
    public function categoryRelation()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}