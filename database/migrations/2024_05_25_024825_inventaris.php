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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->increments('idinventaris');
            $table->string('nama');
            $table->enum('kondisi',['Selesai','Proses'])->default('Proses');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->integer('idjenis');
            $table->date('tanggalregister');
            $table->integer('idruang');
            $table->string('kodeinventaris');
            $table->integer('idpetugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
