<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'judul',
        'pengarang',
        'penerbit',
        'tahun',
        'cover',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
