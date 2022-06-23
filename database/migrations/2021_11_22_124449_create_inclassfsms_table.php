<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInclassfsmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inclassfsms', function (Blueprint $table) {
            $table->bigIncrements('id_icf');
            $table->date('tanggal');
            $table->string('nama_employee');
            $table->unsignedBigInteger('id_trainer');
            $table->string('email');
            $table->string('nohp');
            $table->string('status');
            $table->string('jabatan');
            $table->string('account');
            $table->string('nama_toko');
            $table->string('category');
            $table->string('kota');
            $table->string('produk');
            $table->string('nilaipre');
            $table->string('nilaipost');
            $table->timestamps();
        });
        Schema::table('inclassfsms', function (Blueprint $table) {
            $table->foreign('id_trainer')->references('id_trainer')->on('trainers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inclassfsms');
    }
}
