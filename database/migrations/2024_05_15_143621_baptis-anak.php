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
        Schema::create('baptis_anak', function (Blueprint $table) {
            $table->bigIncrements('id'); // kolom primary key dengan auto increment
            $table->unsignedBigInteger('id_user'); // kolom untuk foreign key harus unsigned
            $table->string('nama_anak');
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->date('tgl_lahir');
            $table->date('tgl_pelaksanaan');
            $table->time('waktu_pelaksanaan');
            $table->string('akta_kelahiran');
            $table->string('kartu_keluarga');
            $table->enum('status', ['PROSES', 'DITERIMA', 'DITOLAK'])->default('PROSES');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baptis-anak');
    }
};
