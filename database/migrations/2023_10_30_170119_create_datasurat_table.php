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
        Schema::create('data_surat', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('id_user')->nullable();
            $table->unsignedBigInteger('id_ibadah')->nullable();
            $table->string('id_pendeta')->nullable();
            $table->string('surat_link')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ibadah')->references('id')->on('ibadah_syukur')->onDelete('cascade');
            $table->foreign('id_pendeta')->references('id')->on('users')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_surat');
    }
};
