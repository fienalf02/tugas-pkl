<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade');
            $table->integer('id_jadwal')->unsigned();
            $table->foreign('id_jadwal')->references('id')->on('jadwals')->onDelete('cascade');
            $table->integer('semester');
            $table->integer('rapot');
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
        Schema::dropIfExists('nilais');
    }
}
