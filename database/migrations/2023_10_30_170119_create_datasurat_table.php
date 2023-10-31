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
        Schema::create('datasurat', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('ibadah_id')->nullable();
            $table->integer('pendeta_id')->nullable();
            $table->string('surat_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasurat');
    }
};
