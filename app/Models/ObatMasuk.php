<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
    protected $table = 'obat_masuk';

    protected $primaryKey = 'id_masuk';

    protected $fillable = [
        'id_obat',
        'id_supplier',
        'jumlah',
        'tanggal_masuk',
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

    public function supplier()
    {
        return $this->belongsTo(
            Supplier::class,
            'id_supplier',
            'id_supplier'
        );
    }
}