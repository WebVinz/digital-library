<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('buku_id');
            $table->enum('status', ['dipinjam', 'dikembalikan']);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('buku_id')
                ->references('id')
                ->on('bukus')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }

};
