<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';

    protected $primaryKey = 'id_supplier';

    protected $fillable = [
        'nama_supplier',
        'telepon',
        'alamat'
    ];

    public function obatMasuk()
    {
        return $this->hasMany(
            ObatMasuk::class,
            'id_supplier',
            'id_supplier'
        );
    }
}