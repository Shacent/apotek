<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
    protected $table = 'obat_keluar';

    protected $primaryKey = 'id_keluar';

    protected $fillable = [
        'id_obat',
        'jumlah',
        'tanggal_keluar',
        'tujuan',
        'keterangan'
    ];

    public function obat()
    {
        return $this->belongsTo(
            Obat::class,
            'id_obat',
            'id_obat'
        );
    }
}