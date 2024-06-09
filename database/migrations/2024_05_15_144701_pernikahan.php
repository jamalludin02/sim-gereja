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
        Schema::create('pernikahan', function (Blueprint $table) {
            $table->bigIncrements('id'); // kolom primary key dengan auto increment
            $table->string('id_user_laki')->nullable();
            $table->string('id_user_perempuan')->nullable();
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('ktp_laki');
            $table->string('ktp_perempuan');
            $table->unsignedBigInteger('sidi_laki')->nullable();
            $table->unsignedBigInteger('sidi_perempuan')->nullable();
            $table->string('id_pendeta')->nullable();
            $table->enum('status', ['PROSES', 'DITERIMA', 'DITOLAK'])->default('PROSES');
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('id_user_laki')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('id_user_perempuan')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('sidi_laki')->references('id')->on('sidi')->onDelete('SET NULL');
            $table->foreign('sidi_perempuan')->references('id')->on('sidi')->onDelete('SET NULL');
            $table->foreign('id_pendeta')->references('id')->on('users')->onDelete('SET NULL');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pernikahan');
    }
};
