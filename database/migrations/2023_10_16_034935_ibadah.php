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
        Schema::create('ibadah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kk');   
            $table->string('alamat');
            $table->string('lingkungan');
            $table->string('no_wa');
            $table->integer('status');
            $table->string('tanggal');
            $table->string('jam');
            $table->string('pendeta');
            $table->unsignedBigInteger('pendeta_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibadah');
    }
};
