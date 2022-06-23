<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstorelainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instorelains', function (Blueprint $table) {
            $table->bigIncrements('id_isl');
            $table->date('tanggal');
            $table->string('nama_employee');
            $table->unsignedBigInteger('id_trainer');
            $table->string('employee_id');
            $table->string('instore');
            $table->string('jenis');
            $table->string('produk');
            $table->string('tipe_produk');
            $table->string('issue');
            $table->string('gambar');
            $table->string('jenis_ajar');
            $table->string('nilai_selling1');
            $table->string('nilai_selling2');
            $table->string('nilai_selling3');
            $table->string('nilai_selling4');
            $table->string('nilai_selling5');
            $table->string('nilai_selling6');
            $table->string('nilai_selling7');
            $table->string('nilai_selling8');
            $table->string('nilai_selling9');
            $table->string('nilai_selling10');
            $table->string('nilai_produk1');
            $table->string('nilai_produk2');
            $table->string('nilai_produk3');
            $table->string('nilai_produk4');
            $table->string('nilai_produk5');
            $table->string('nilai_knowledge1');
            $table->string('nilai_knowledge2');
            $table->string('nilai_knowledge3');
            $table->string('nilai_knowledge4');
            $table->string('nilai_knowledge5');
            $table->timestamps();
        });
        Schema::table('instorelains', function (Blueprint $table) {
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
        Schema::dropIfExists('instorelains');
    }
}
