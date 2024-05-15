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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement()->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->enum('role', ['PENDETA', 'UMAT', 'KETLING'])->default('UMAT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
