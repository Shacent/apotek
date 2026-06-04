<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    public function run(): void
    {
        $obat = [

            // Analgesik (1)
            ['OBT001','Paracetamol 500mg',1],
            ['OBT002','Ibuprofen 400mg',1],
            ['OBT003','Asam Mefenamat 500mg',1],

            // Antibiotik (2)
            ['OBT004','Amoxicillin 500mg',2],
            ['OBT005','Cefadroxil 500mg',2],
            ['OBT006','Azithromycin 500mg',2],

            // Antihistamin (3)
            ['OBT007','Cetirizine 10mg',3],
            ['OBT008','Loratadine 10mg',3],
            ['OBT009','CTM 4mg',3],

            // Vitamin (4)
            ['OBT010','Vitamin C 500mg',4],
            ['OBT011','Vitamin D3',4],
            ['OBT012','Multivitamin A-Z',4],

            // Batuk Flu (5)
            ['OBT013','OBH Combi',5],
            ['OBT014','Siladex Batuk',5],
            ['OBT015','Komix Herbal',5],

            // Lambung (6)
            ['OBT016','Promag',6],
            ['OBT017','Mylanta',6],
            ['OBT018','Lansoprazole 30mg',6],

            // Diabetes (7)
            ['OBT019','Metformin 500mg',7],
            ['OBT020','Glimepiride 2mg',7],
            ['OBT021','Acarbose 50mg',7],

            // Hipertensi (8)
            ['OBT022','Amlodipine 5mg',8],
            ['OBT023','Captopril 25mg',8],
            ['OBT024','Valsartan 80mg',8],

            // Kulit (9)
            ['OBT025','Salep Gentamicin',9],
            ['OBT026','Salep Hidrokortison',9],
            ['OBT027','Salep Miconazole',9],

            // Mata (10)
            ['OBT028','Insto Regular',10],
            ['OBT029','Cendo Xitrol',10],
            ['OBT030','Rohto Cool',10],
        ];

        foreach ($obat as $index => $item) {

            $hargaBeli = rand(5000, 50000);

            Obat::create([
                'kode_obat' => $item[0],
                'nama_obat' => $item[1],
                'id_kategori' => $item[2],
                'satuan' => 'Strip',
                'harga_beli' => $hargaBeli,
                'harga_jual' => $hargaBeli + rand(2000, 15000),
                'stok' => rand(5, 45),
                'tanggal_kadaluarsa' => now()->addMonths(rand(6, 36)),
            ]);
        }
    }
}