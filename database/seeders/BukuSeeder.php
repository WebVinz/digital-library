<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kode' => 'BK001',
                'judul' => 'Pemrograman Web Laravel',
                'pengarang' => 'Eko Kurniawan',
                'penerbit' => 'Informatika',
                'tahun' => 2021,
                'cover' => 'cover_buku/default.jpg',
            ],
            [
                'kode' => 'BK002',
                'judul' => 'Dasar-Dasar PHP',
                'pengarang' => 'Budi Santoso',
                'penerbit' => 'Andi Publisher',
                'tahun' => 2020,
                'cover' => 'cover_buku/default.jpg',
            ],
            [
                'kode' => 'BK003',
                'judul' => 'Algoritma & Struktur Data',
                'pengarang' => 'Rinaldi Munir',
                'penerbit' => 'Informatika',
                'tahun' => 2019,
                'cover' => 'cover_buku/default.jpg',
            ],
            [
                'kode' => 'BK004',
                'judul' => 'Basis Data MySQL',
                'pengarang' => 'Kadir',
                'penerbit' => 'Andi',
                'tahun' => 2018,
                'cover' => 'cover_buku/default.jpg',
            ],
            [
                'kode' => 'BK005',
                'judul' => 'Pemrograman Berorientasi Objek',
                'pengarang' => 'Abdul Kadir',
                'penerbit' => 'Andi Publisher',
                'tahun' => 2022,
                'cover' => 'cover_buku/default.jpg',
            ],
        ];

        foreach ($data as $buku) {
            Buku::create($buku);
        }
    }
}
