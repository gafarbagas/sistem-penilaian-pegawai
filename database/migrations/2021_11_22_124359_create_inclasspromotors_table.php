<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInclasspromotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inclasspromotors', function (Blueprint $table) {
            $table->bigIncrements('id_icp');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_employee');
            $table->unsignedBigInteger('id_trainer');
            $table->string('nilai1');
            $table->string('nilai2');
            $table->string('nilai3');
            $table->string('produk');
            $table->string('nilaipre');
            $table->string('nilaipost');
            $table->timestamps();
        });

        Schema::table('inclasspromotors', function (Blueprint $table) {
            $table->foreign('id_employee')->references('id_employee')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('inclasspromotors');
    }
}
