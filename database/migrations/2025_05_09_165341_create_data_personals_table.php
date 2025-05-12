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
        Schema::create('data_personals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_depan')->nullable();
            $table->string('nama_belakang')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('agama', ['islam', 'katolik', 'protestan', 'hindu', 'budha','konghuncu'])->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('no_ponsel')->nullable();
            $table->string('alamat_tinggal')->nullable();
            $table->string('propinsi_tinggal')->nullable();
            $table->string('kabupaten_tinggal')->nullable();
            $table->string('kecamatan_tinggal')->nullable();
            $table->string('desa_tinggal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_personals');
    }
};
