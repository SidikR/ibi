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
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('status_pekerjaan')->nullable();
            $table->string('tempat_kerja')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('alamat_kerja')->nullable();
            $table->string('propinsi_kerja')->nullable();
            $table->string('kabupaten_kerja')->nullable();
            $table->string('kecamatan_kerja')->nullable();
            $table->string('desa_kerja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaans');
    }
};
