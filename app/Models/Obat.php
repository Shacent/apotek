<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    protected $primaryKey = 'id_obat';

    protected $fillable = [
        'id_kategori',
        'kode_obat',
        'nama_obat',
        'satuan',
        'harga_beli',
        'harga_jual',
        'stok',
        'tanggal_kadaluarsa'
    ];

    public function kategori()
    {
        return $this->belongsTo(
            KategoriObat::class,
            'id_kategori',
            'id_kategori'
        );
    }

    public function obatMasuk()
    {
        return $this->hasMany(
            ObatMasuk::class,
            'id_obat',
            'id_obat'
        );
    }

    public function obatKeluar()
    {
        return $this->hasMany(
            ObatKeluar::class,
            'id_obat',
            'id_obat'
        );
    }
}