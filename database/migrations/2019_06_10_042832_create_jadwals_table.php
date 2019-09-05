<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hari');
            $table->char('jam');
            $table->string('ruangan');
            $table->char('tahun_ajaran');
            $table->integer('id_guru')->unsigned();
            $table->foreign('id_guru')->references('id')->on('gurus')->onDelete('cascade');
            $table->integer('id_mapel')->unsigned();
            $table->foreign('id_mapel')->references('id')->on('mapels')->onDelete('cascade');
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
        Schema::dropIfExists('jadwals');
    }
}
