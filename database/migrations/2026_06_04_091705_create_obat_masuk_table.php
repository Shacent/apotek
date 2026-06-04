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
        Schema::create('obat_masuk', function (Blueprint $table) {
            $table->id('id_masuk');
            $table->unsignedBigInteger('id_obat');
            $table->unsignedBigInteger('id_supplier');
            $table->integer('jumlah');
            $table->date('tanggal_masuk');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_obat')->references('id_obat')->on('obat');
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_masuk');
    }
};
