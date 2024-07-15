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
            $table->foreignId('eskul_id')->nullable()->constrained()->nullOnDelete();

            // $table->foreignId('department_id')->nullable()->constrained();
            //   $table->foreignId('organination_id')->constrained('organinations')->nullOnDelete();
            // jika ingin menambahkan foreign key ke table lain, gunakan ->constrained('nama_table')
            // jika ingin menambahkan foreign key ke table yang terdapat multi-column, gunakan ->constrained(['nama_kolom1', 'nama_kolom2'])
            // jika ingin menambahkan foreign key ke table yang terdapat multi-table, gunakan ->constrained(['nama_table1', 'nama_table2'], function ($table) {
            //     $table->onDelete('cascade'); // jika menghapus data di table lain, data yang terikat juga akan dihapus
            //     $table->onUpdate('cascade'); // jika diubah data di table lain, data yang terikat juga akan diubah
            // });
            // jika ingin menambahkan foreign key ke table yang terdapat multi-table, gunakan ->constrained(['nama
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
