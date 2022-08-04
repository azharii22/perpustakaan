<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_peminjaman');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('data_buku_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_diambil');
            $table->date('tanggal_pengambilan')->nullable();
            $table->date('tanggal_pengembalian')->nullable();
            $table->date('tanggal_pengembalian_aktual')->nullable();
            $table->enum('status', ['BARU', 'BERHASIL', 'TOLAK']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamans');
    }
}
