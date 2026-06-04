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
        Schema::create('obat_keluar', function (Blueprint $table) {
            $table->id('id_keluar');
            $table->unsignedBigInteger('id_obat');
            $table->integer('jumlah');
            $table->date('tanggal_keluar');
            $table->string('tujuan')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_obat')->references('id_obat')->on('obat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_keluar');
    }
};
