<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // Tentukan kolom-kolom yang boleh diisi secara massal (mass assignable)
    protected $fillable = [
        'author_name',
        'author_company',
        'author_role',
        'content',
        'rating',
        'status', // status: 'pending', 'approved', 'rejected'
        'image', // Jika Anda menambahkan kolom gambar
    ];

    // Jika Anda ingin mengizinkan semua kolom diisi (kurang aman, hati-hati)
    // protected $guarded = [];
}