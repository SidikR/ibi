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
        Schema::create('perizinans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('no_str')->nullable();
            $table->string('masa_berlaku_str')->nullable();
            $table->string('no_sipb_fasyankes')->nullable();
            $table->string('masa_berlaku_sipb_fasyankes')->nullable();
            $table->string('no_sipb_praktik_mandiri')->nullable();
            $table->string('masa_berlaku_sipb_praktik_mandiri')->nullable();
            $table->string('no_sipb_bidan_delima')->nullable();
            $table->string('masa_berlaku_sipb_bidan_delima')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perizinans');
    }
};
