<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dosen');
            $table->string('alamat_dosen');
            $table->string('no_telp', 20)->unique(); // Ensure 'unique' method is used correctly
            $table->string('foto_dosen')->nullable();
            $table->timestamps();
        });        
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
