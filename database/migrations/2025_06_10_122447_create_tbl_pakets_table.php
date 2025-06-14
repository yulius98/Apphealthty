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
        Schema::create('tbl_pakets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket')->unique();
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 50, 2);
            $table->string('panduan_paket')->nullable();
            $table->string('video_panduan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pakets');
    }
};