<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id('id_obat');
            $table->foreignId('id_kategori')->constrained('kategori_obat', 'id_kategori');
            $table->string('kode_obat')->unique();
            $table->string('nama_obat');
            $table->string('satuan');
            $table->decimal('harga_beli', 12, 2);
            $table->decimal('harga_jual', 12, 2);
            $table->integer('stok')->default(0);
            $table->date('tanggal_kadaluarsa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
