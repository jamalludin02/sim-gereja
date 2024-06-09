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
        Schema::create('ibadah_syukur', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key with auto increment
            $table->string('id_user')->nullable();
            $table->string('id_pendeta')->nullable();
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('keterangan');
            $table->enum('status', ['PROSES', 'DITERIMA', 'DITOLAK'])->default('PROSES');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_pendeta')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibadah-syukur');
    }
};
