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
        Schema::create('sidi', function (Blueprint $table) {
            $table->bigIncrements('id'); // kolom primary key dengan auto increment
            $table->string('id_user'); // kolom untuk foreign key harus unsigned
            $table->string('surat_baptis');
            $table->enum('status', ['PROSES', 'DITERIMA', 'DITOLAK'])->default('PROSES');
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sidi');
    }
};
