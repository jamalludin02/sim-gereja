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
        // Schema::create('umat', function (Blueprint $table) {
        //     $table->bigIncrements('id')->autoIncrement()->unsigned();
        //     $table->string('nama_kk')->nullable();   
        //     $table->string('alamat')->nullable();
        //     $table->string('lingkungan')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('umat');
    }
};
