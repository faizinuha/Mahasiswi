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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id(); // ini auto increment dan primary key
            $table->string('nama');
            $table->string('nim', 20);
            $table->string('alamat');
            $table->string('no_telp', 20);
            $table->foreignId('organination_id')->constrained('organinations');
            $table->foreignId('department_id')->nullable()->constrained();
            $table->foreignId('eskuls_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
