<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInclasssalesmensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inclasssalesmens', function (Blueprint $table) {
            $table->bigIncrements('id_ics');
            $table->date('tanggal');
            $table->string('nama_employee');
            $table->unsignedBigInteger('id_trainer');
            $table->string('employee_id');
            $table->string('produk');
            $table->string('nilaipre');
            $table->string('nilaipost');
            $table->timestamps();
        });
        Schema::table('inclasssalesmens', function (Blueprint $table) {
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
        Schema::dropIfExists('inclasssalesmens');
    }
}
