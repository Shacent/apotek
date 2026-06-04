<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriObat;

class KategoriObatSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Analgesik',
            'Antibiotik',
            'Antihistamin',
            'Vitamin & Suplemen',
            'Obat Batuk & Flu',
            'Obat Lambung',
            'Obat Diabetes',
            'Obat Hipertensi',
            'Obat Kulit',
            'Obat Mata',
        ];

        foreach ($kategori as $nama) {
            KategoriObat::create([
                'nama_kategori' => $nama,
            ]);
        }
    }
}