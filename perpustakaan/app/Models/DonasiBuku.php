<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DonasiBuku extends Model
{
    use HasFactory;

    protected $table = 'donasi_buku';

    protected $fillable = [
        'user_id',
        'judul_buku',
        'pengarang',
        'deskripsi',
        'jumlah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}