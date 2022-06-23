<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_trainer');
            $table->unsignedBigInteger('id_employee');
            $table->timestamps();
        });

        Schema::table('grups', function (Blueprint $table) {
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
        Schema::dropIfExists('grups');
    }
}
