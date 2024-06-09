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
            $table->string('id', 10)->primary()->unique();  // Use string with length 10 as primary key
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('alamat')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->foreignId('id_lingkungan')->nullable()->constrained('lingkungan')->nullOnDelete(); 
            $table->enum('role', [ 'UMAT', 'PENDETA' , 'ADMIN'])->default('UMAT');
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
