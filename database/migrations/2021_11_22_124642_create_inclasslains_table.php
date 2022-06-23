<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInclasslainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inclasslains', function (Blueprint $table) {
            $table->bigIncrements('id_icl');
            $table->date('tanggal');
            $table->string('nama_employee');
            $table->unsignedBigInteger('id_trainer');
            $table->string('employee_id');
            $table->string('nilai1');
            $table->string('nilai2');
            $table->string('nilai3');
            $table->string('produk');
            $table->string('nilaipre');
            $table->string('nilaipost');
            $table->timestamps();
        });
        Schema::table('inclasslains', function (Blueprint $table) {
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
        Schema::dropIfExists('inclasslains');
    }
}
