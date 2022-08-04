<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_bukus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_kategori_id')->constrained()->onDelete('cascade');
            $table->foreignId('data_rak_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->string('slug');
            $table->integer('jumlah')->default(1);
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('th_terbit');
            $table->longText('deskripsi');
            $table->string('gambar')->default('default.jpg');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_bukus');
    }
}
